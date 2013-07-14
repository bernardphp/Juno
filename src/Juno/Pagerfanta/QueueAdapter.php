<?php

namespace Juno\Pagerfanta;

use Bernard\Queue;

/**
 * @package Juno
 */
class QueueAdapter implements \Pagerfanta\Adapter\AdapterInterface
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
    public function getNbResults()
    {
        return $this->queue->count();
    }

    /**
     * {@inheritDoc}
     */
    public function getSlice($length, $offset)
    {
        return $this->queue->peek($offset, $length);
    }
}
