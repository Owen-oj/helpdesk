<?php


namespace App\Repositories\Composers;


use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\TicketRepository;
use App\Repositories\Models\Category;
use App\Repositories\Models\Solution;
use App\User;
use Illuminate\View\View;

class DashboardComposer
{
    protected $tickets,$categories;

    public function __construct(TicketRepository $repository,CategoryRepository $categories)
    {
        $this->tickets = $repository;
        $this->categories = $categories;
    }

    public function compose(View $view)
    {
        $view->with('allTickets',$this->tickets->all()->count());
        $view->with('openTickets',$this->tickets->tickets(0)->count());
        $view->with('closedTickets',$this->tickets->tickets(1)->count());
        $view->with('solutions',Solution::all());

        $datacounts = User::listAll();
        $users = User::listUsers();

        $pluck =$datacounts->pluck('name');
        $cat = $this->categories->with('tickets')->all();
        $c = $cat->pluck('ticket_count');
        $t = str_replace('"', "", $c);

        //dd($t);

        //dd($v->all());
        $view->with('agentTicketCount',$datacounts->implode('ticketCount',','));
        $view->with('agents',$datacounts);
        $view->with('users',$users);
        $view->with('cat',$t);
    }

}