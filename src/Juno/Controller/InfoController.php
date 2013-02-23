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
        $queues = $this->app['raekke.queue_manager'];
        $pending = array_reduce($queues->all()->getValues(), function ($v, $queue) {
            return $v + $queue->count();
        });

        return $this->app['twig']->render('@Juno/Info/index.html.twig', array(
            'pending' => $pending,
            'queues'  => $queues->count(),
        ));
    }

    /**
     * @return string
     */
    public function connectionAction()
    {
        return $this->app['twig']->render('@Juno/Info/connection.html.twig', array(
            'info' => $this->app['raekke.connection']->info(),
        ));
    }
}
