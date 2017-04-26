<?php


namespace App\Repositories\Composers;


use App\Repositories\Contracts\TicketRepository;
use Illuminate\View\View;

class DashboardComposer
{
    protected $tickets;

    public function __construct(TicketRepository $repository)
    {
        $this->tickets = $repository;
    }

    public function compose(View $view)
    {
        $view->with('allTickets',$this->tickets->all()->count());
        $view->with('openTickets',$this->tickets->tickets(0)->count());
        $view->with('closedTickets',$this->tickets->tickets(1)->count());
    }

}