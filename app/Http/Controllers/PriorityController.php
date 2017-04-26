<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PriorityRepository;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    protected $priorities;

    public function __construct(PriorityRepository $priorities)
    {
        $this->priorities = $priorities;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = $this->priorities->all();

        return view('priority.index',compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('priority.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->priorities->create($request->all());

        return redirect(route('priorities.index'))->with('message','Priority Added');
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
        $priority = $this->priorities->find($id);

        return view('priority.edit',compact('priority'));
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
        $this->priorities->update($request->all(),$id);

        return redirect(route('priorities.index'))->with('message','Priority Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->priorities->delete($id);

        return redirect(route('priorities.index'))->with('message','Priority Deleted');
    }
}
