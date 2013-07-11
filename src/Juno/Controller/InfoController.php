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
        $queues  = $this->pimple['bernard.queue_factory']->all();
        $failed  = isset($queues['failed']) ? $queues->create('failed')->count() : 0;

        $pending = -$failed + array_reduce($queues, function ($v, $queue) {
            return $v + $queue->count();
        });

        return $this->pimple['twig']->render('@Juno/Info/index.html.twig', array(
            'pending'   => $pending,
            'queues'    => count($queues),
            'failed'    => $failed,
            'consumers' => 0,
        ));
    }

    /**
     * @return string
     */
    public function driverAction()
    {
        return $this->pimple['twig']->render('@Juno/Info/driver.html.twig', array(
            'info' => $this->pimple['bernard.driver_real']->info(),
        ));
    }
}
