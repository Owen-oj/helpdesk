<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\TicketRepository;
use App\Repositories\Models\Agent;
use App\Repositories\Models\Solution;
use App\Repositories\Models\Status;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TicketController extends Controller
{
    protected $tickets;

    /**
     * TicketController constructor.
     * @param TicketRepository $tickets
     */
    public function __construct(TicketRepository $tickets)
    {
        $this->tickets = $tickets;

        $this->middleware(['role:admin'])->only('delete');

    }

    /**
     * Display a open Tickets.
     * for a given user
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*$tedt =  $this->tickets->tickets(0);
      /* $ag = User::with('agentTickets')->whereHas('roles',function ($query){
           $query->where('name','agent');
       })->get();*/

       //d($ag->pluck('name'));*/

        $completed = 0;
        return view('tickets.index', compact('completed'));
    }

    /**
     * Return data for Datatables
     * @param $completed
     * @return mixed
     */
    public function indexTable($completed)
    {
        $tickets = $this->tickets->activeTickets($completed);

        return Datatables::of($tickets)
            ->editColumn('subject', '<a href="{{ route("tickets.show",$id) }}" >{{$subject}}</a>')
            ->editColumn('updated_at','{{$updated_at->diffForHumans()}}')
            ->make(true);

    }


    /**
     * Display all completed tickets
     * for a given user
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexComplete()
    {
        $completed = 1;

        return view('tickets.index', compact('completed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->tickets->createTicket($request->all());


        return redirect(route('tickets.index'))->with('message','ticket Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $ticket =  $this->tickets->find($id);

        return view('tickets.show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->tickets->update($request->all(),$id);

        return redirect()->back()->with('message','Ticket Updated');

    }

    public function markComplete(Request $request ,$id)
    {
        $this->middleware('role:admin|agent');

        Solution::create($request->all()+['agent_id'=>auth()->id()]);

        $this->tickets->update(['status_id'=>Status::where('name','Complete')->first()->id,'completed_at'=>Carbon::now()],$id);

        return redirect()->back()->with('message','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tickets->delete($id);

        return redirect(route('tickets.index'))->with('message','Deleted');
    }
}
