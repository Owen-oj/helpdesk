<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TicketRepository
 * @package namespace App\Repositories\Contracts;
 */
interface TicketRepository extends RepositoryInterface
{
    /**
     * Create New Ticket
     * @param array $data
     * @return mixed
     */
    public function createTicket(array $data);

    public function tickets($complete);
    /**
     * Return all active Tickets
     * @return mixed
     */
    public function activeTickets ( $complete);

    /**
     * Return all completed tickets
     * @return mixed
     */
    public function completedTickets ();
}
