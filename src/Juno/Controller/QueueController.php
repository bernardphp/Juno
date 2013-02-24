<?php

namespace Juno\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * @package Juno
 */
class QueueController extends \Flint\Controller\Controller
{
    /**
     * @return string
     */
    public function indexAction()
    {
        return $this->render('@Juno/Queue/index.html.twig', array(
            'queues' => $this->app['raekke.queue_factory'],
        ));
    }

    /**
     * @param string $queue
     * @return string
     */
    public function showAction(Request $request, $queue)
    {
        $queue = $this->app['raekke.queue_factory']->create($queue);

        return $this->render('@Juno/Queue/show.html.twig', array(
            'queue' => $queue,
        ));
    }

    /**
     * @param string $queue
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($queue)
    {
        $queues = $this->app['raekke.queue_factory'];
        $queues->remove($queue);

        return $this->redirect($this->app['router']->generate('juno_queue_index'));
    }
}
