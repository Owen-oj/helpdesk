<?php

namespace App\Repositories\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;



    protected $fillable = ['name','color'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
   /* public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }*/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function getTicketCountAttribute()
    {
        return $this->tickets->count();
    }
}
