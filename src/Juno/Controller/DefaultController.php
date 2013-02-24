<?php

namespace Juno\Controller;

/**
 * @package Juno
 */
class DefaultController extends \Flint\Controller\Controller
{
    /**
     * @return string
     */
    public function indexAction()
    {
        $queues = $this->app['raekke.queue_factory'];

        return $this->render('@Juno/index.html.twig', compact('queues'));
    }
}
