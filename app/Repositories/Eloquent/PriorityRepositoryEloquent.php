<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Models\Priority;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\PriorityRepository;

/**
 * Class PriorityRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class PriorityRepositoryEloquent extends BaseRepository implements PriorityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Priority::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
