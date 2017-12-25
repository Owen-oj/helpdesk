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
        //$view->with('solutions',Solution::all());

        $datacounts = User::listAll();
        $users = User::listUsers();

        $pluck =$datacounts->pluck('name');
        $cat = $this->categories->with('tickets')->all();
        $category_ticket_counts = $cat->implode("ticket_count",',');
        $category_names = $cat->implode("name",',');
        $category_colours =  $cat->implode("color",',');
        //dd(json_decode('"' . $category_colours . '"', false));

        //dd($v->all());
        $view->with('agentTicketCount',$datacounts->implode('ticketCount',','));
        $view->with('agents',$datacounts);
        $view->with('users',$users);
        $view->with('cat',$category_ticket_counts);
        $view->with('cat_names',$category_names);
        $view->with('cat_colors',$category_colours);
    }

}