<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
