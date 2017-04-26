<?php

namespace App\Repositories\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Status extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name','color'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
