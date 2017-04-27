<?php

namespace App\Repositories\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Ticket extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'subject',
        'content',
        'status_id',
        'category_id',
        'priority_id',
        'user_id',
        'agent_id',
        'completed_at'

    ];

    protected $dates = ['complete_at'];

    protected $with = ['statuses','priorities','categories','agents','owners','comments'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priorities()
    {
        return $this->belongsTo(Priority::class,'priority_id','id');
    }

    /**
     * Ticket has a status
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statuses()
    {
        return $this->belongsTo(Status::class,'status_id','id');
    }


    /**
     * A ticket belongs to a category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    /**
     * A ticket is always assigned to an agent
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agents()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }

    /**
     * A ticket belongs to  a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owners()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
