<?php

namespace App\Repositories\Models;

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

}
