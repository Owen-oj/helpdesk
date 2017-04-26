<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\StatusRepository;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected $statuses;

    public function __construct(StatusRepository $statuses)
    {
        $this->statuses = $statuses;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = $this->statuses->all();

        return view('status.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->statuses->create($request->all());

        return redirect(route('statuses.index'))->with('message','Status Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = $this->statuses->find($id);

        return view('status.edit',compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->statuses->update($request->all(),$id);

        return redirect(route('statuses.index'))->with('message','Status Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->statuses->delete($id);

        return redirect(route('statuses.index'))->with('message','Deleted');
    }
}
