<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Contracts\TicketRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class TicketController extends Controller
{
    protected $tickets;

    public function __construct(TicketRepository $tickets)
    {
        $this->tickets = $tickets;
        /*$this->middleware(['auth']);*/
    }

    public function index($completed)
    {
        $tickets = $this->tickets->tickets($completed)->get();

        return json_encode($tickets);
    }

    public function store()
    {
        $data = [
            'subject' => Input::get('subject'),
            'content' => Input::get('content'),
            'category_id' => Input::get('category_id'),
            'priority_id' => Input::get('priority_id'),
            'status_id'   => 8,
            'location' => Input::get('location'),
            'user_id' => Input::get('user_id'),
            'agent_id' => 2

        ];

        $ticket = $this->tickets->create($data);

        if ($ticket){
            return json_encode([
                'message' =>'Thanks for the submission'
            ]);
        }else
            return json_encode([
                'message' => 'There was an error'
            ]);
    }
}
