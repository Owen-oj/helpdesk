<?php

namespace App\Repositories\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Solution extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'ticket_id',
        'solution',
        'agent_id'
    ];

    public function agent()
    {
        return $this->hasOne(User::class,'id','agent_id');
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class,'id','ticket_id');
    }

}
