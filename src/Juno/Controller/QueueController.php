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
            'queues' => $this->pimple['bernard.queue_factory'],
        ));
    }

    /**
     * @param string $name
     * @return string
     */
    public function showAction(Request $request, $name)
    {
        $queue = $this->pimple['bernard.queue_factory']->create($name);

        return $this->render('@Juno/Queue/show.html.twig', array(
            'queue' => $queue,
            'name'  => $name,
            'count' => $queue->count(),
            'start' => $request->query->get('start', 0),
            'limit' => $request->query->get('limit', 20),
        ));
    }

    /**
     * @param string $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($name)
    {
        $this->pimple['bernard.queue_factory']->remove($queue);

        return $this->redirect($this->pimple['router']->generate('juno_queue'));
    }
}
