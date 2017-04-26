<?php

namespace App\Repositories\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comment extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'content',
        'ticket_id',
        'user_id'
    ];


    /**
     * Comments belong to Users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
       return $this->belongsTo(User::class,'user_id');
    }

}
