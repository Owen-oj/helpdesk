<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AgentRepository;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    protected $agents;

    public function __construct(AgentRepository $agents)
    {
        $this->agents = $agents;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = $this->agents->allAgents();

        return view('agents.index',compact('agents'));
    }

    /**
     *
     * List all normal users
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users()
    {
        $users = $this->agents->users();

        return view('agents.users',compact('users'));
    }

    /**
     * Add New Agent
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function addAgent($id)
    {
        $this->agents->addAgent($id);
        return redirect(route('agents.index'))->with('User is now an Agent');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeAgent($id)
    {
        $this->agents->removeAgent($id);

        return redirect(route('agents.index'))->with('message','Agent removed');
    }
}
