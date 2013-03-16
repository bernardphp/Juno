<?php

namespace Juno\Controller;

/**
 * @package Juno
 */
class InfoController extends \Flint\Controller\Controller
{
    /**
     * @return string
     */
    public function indexAction()
    {
        $queues  = $this->app['bernard.queue_factory'];
        $failed  = $queues->create('failed')->count();
        $pending = -$failed + array_reduce($queues->all(), function ($v, $queue) {
            return $v + $queue->count();
        });

        return $this->app['twig']->render('@Juno/Info/index.html.twig', array(
            'pending'   => $pending,
            'queues'    => $queues->count(),
            'failed'    => $failed,
            'consumers' => 0,
        ));
    }

    /**
     * @return string
     */
    public function connectionAction()
    {
        return $this->app['twig']->render('@Juno/Info/connection.html.twig', array(
            'info' => $this->app['bernard.connection']->info(),
        ));
    }
}
