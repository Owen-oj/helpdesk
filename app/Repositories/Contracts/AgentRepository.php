<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AgentRepository
 * @package namespace App\Repositories\Contracts;
 */
interface AgentRepository extends RepositoryInterface
{
    /**
     * Show all Agents
     * @return mixed
     */
    public function allAgents();
    /**
     * Add User as an Agent
     * @param $user_id
     * @return mixed
     */
    public function addAgent($user_id);

    /**
     * Detach Agent role from a User
     * @param $user_id
     * @return mixed
     */
    public function removeAgent($user_id);

    /**
     * List users without Agent role
     * @return mixed
     */
    public function users();
}
