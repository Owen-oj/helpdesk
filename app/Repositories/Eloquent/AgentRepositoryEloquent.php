<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Models\Role;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AgentRepository;
use App\Repositories\Models\Agent;
use App\Validators\AgentValidator;

/**
 * Class AgentRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class AgentRepositoryEloquent extends BaseRepository implements AgentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Agent::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Show all Agents
     * @return mixed
     */
    public function allAgents()
    {
        $agents = $this->whereHas('roles',function ($query){

            $query->where('name','agent');

        })->all();

        return $agents;
    }

    /**
     * Add User as an Agent
     * @param $user_id
     * @return mixed
     */
    public function addAgent($user_id)
    {
        $agent = Role::where('name','agent')->first();
        $user = $this->find($user_id);
        $user->attachRole($agent);
        return true;
    }

    /**
     * Detach Agent role from a User
     * @param $user_id
     * @return mixed
     */
    public function removeAgent($user_id)
    {
        $agent = Role::where('name','agent')->first();
        $user = $this->find($user_id);
        $user->detachRole($agent);
        return true;
    }


    /**
     * List users without Agent role
     * @return mixed
     */
    public function users()
    {
        $agents = $this->allAgents()->implode('id',',');
        $users = $this->findWhereNotIn('id',json_decode('['.$agents.']',true));
        return $users;
    }
}
