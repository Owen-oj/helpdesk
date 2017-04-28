<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\solutionRepository;
use App\Repositories\Models\Solution;
use App\Validators\SolutionValidator;

/**
 * Class SolutionRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class SolutionRepositoryEloquent extends BaseRepository implements SolutionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Solution::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
