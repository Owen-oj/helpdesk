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
        'name', 'email', 'password','phone_number',
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

    /**
     * An agent has many tickets assigned to him/her
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agentTickets()
    {
        return $this->hasMany(Ticket::class,'agent_id','id');
    }


    /**
     * List all agents in the system
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function listAll()
    {
        $agents = User::with('agentTickets')->whereHas('roles',function ($query){
            $query->where('name','agent');
        })->get();

        return $agents;
    }

    /**
     * List all normal users in the system
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function listUsers()
    {
        $users = User::with('userTickets')->whereHas('roles',function ($query){
            $query->where('name','user');
        })->get();
        return $users;
    }

    /**
     * Get the total tickets assigned to an agent
     * @return mixed
     */
    public function getTicketCountAttribute()
    {
        return $this->agentTickets->count();
    }

    /**
     * A ticket belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userTickets()
    {
        return $this->hasMany(Ticket::class,'user_id','id');
    }

    /**
     * Get user's phone number to send text message
     * @return string
     */
    public function routeNotificationForNexmo()
    {

        //remove the leading 0 from the phone number and append 233 to it
        return '233'.substr($this->phone_number,1);
    }
}
