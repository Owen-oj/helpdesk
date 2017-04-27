<?php

namespace App\Repositories\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Agent extends User implements Transformable
{
    protected $table = 'users';

    use TransformableTrait;




   /* public static function listAll()
    {
        $agents = User::whereHas('roles',function ($query){
            $query->where('name','agent');
        });

        return $agents;
    }*/

}
