<?php

namespace App;

use App\Repositories\Models\Ticket;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable,EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

   // protected $with = ['agentTickets'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function agentTickets()
    {
        return $this->hasMany(Ticket::class,'agent_id','id');
    }


    public static function listAll()
    {
        $agents = User::with('agentTickets')->whereHas('roles',function ($query){
            $query->where('name','agent');
        })->get();

        return $agents;
    }

    public function getTicketCountAttribute()
    {
        return $this->agentTickets->count();
    }
}
