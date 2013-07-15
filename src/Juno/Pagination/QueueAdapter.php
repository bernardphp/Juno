<?php

namespace Juno\Pagination;

use Bernard\Queue;

/**
 * @package Juno
 */
class QueueAdapter implements \Alex\Pagination\Adapter\AdapterInterface
{
    protected $queue;

    /**
     * @param Queue $queue
     */
    public function __construct(Queue $queue)
    {
        $this->queue = $queue;
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return $this->queue->count();
    }

    /**
     * {@inheritDoc}
     */
    public function get($offset, $limit)
    {
        return $this->queue->peek($offset, $limit);
    }
}
