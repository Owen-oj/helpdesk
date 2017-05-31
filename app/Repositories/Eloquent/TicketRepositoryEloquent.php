<?php

namespace App\Repositories\Eloquent;

use App\Notifications\SendNewTicketAlert;
use App\Notifications\TicketAssignedAlert;
use App\User;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\TicketRepository;
use App\Repositories\Models\Ticket;
/**
 * Class TicketRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class TicketRepositoryEloquent extends BaseRepository implements TicketRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ticket::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Show complete and incomplete tickets
     * @param $complete
     * @return mixed
     */
    public function tickets($complete)
    {
        if ($complete == 0) {
            return Ticket::whereNull('completed_at')->select('tickets.*');

        } else {
            return Ticket::whereNotNull('completed_at')->select('tickets.*');
        }
    }

    /**
     * Return all active or completed tickets
     * for a given user
     * @return mixed
     */
    public function activeTickets($completed)
    {

        if (auth()->user()->hasRole('admin')) {
            $tickets = $this->tickets($completed);
            //dd($tickets);
            return $tickets;
        } elseif (auth()->user()->hasRole('agent')) {
            $tickets = $this->tickets($completed)->where('agent_id', auth()->user()->id);
            return $tickets;
        } else
            $tickets = $this->tickets($completed)->where('user_id', auth()->user()->id);
            //dd($tickets);

        return $tickets;


    }

    /**
     * Return all completed tickets
     * @return mixed
     */
    public function completedTickets()
    {
        //todo to be removed
        return $this->activeTickets($completed = !null);
    }

    /**
     * Create New Ticket
     * @param array $data
     * @return mixed
     */
    public function createTicket(array $data)
    {
        $agent = $this->autoSelect()->first();


       $ticket =  $this->create($data+ [
            'agent_id'=>$agent->id,
            'user_id'=>auth()->id(),
            'status_id'=>1,
           'location' => 'test'
           ]);

       $agent->notify(new SendNewTicketAlert($ticket));
       auth()->user()->notify(new TicketAssignedAlert());

       return $ticket;

    }

    /*
     * Auto select an agent and assign to a created ticket
     * Randomly
     *
     * */

    public function autoSelect()
    {
        $agent = User::whereHas('roles',function ($query){
           $query->where('name','agent');
        })->inRandomOrder()->limit(1)->get();

       // dd($agent->isEmpty());

        if ($agent->isEmpty()) {
           $admin =  User::whereHas('roles',function($query){
            $query->where('name','admin');
           })->first();

           return $admin;
        }else

        return $agent;
    }
}
