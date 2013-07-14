<?php

namespace Juno\Controller;

use Juno\Pagerfanta\QueueAdapter;
use Pagerfanta\Pagerfanta;
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

        $pager = new Pagerfanta(new QueueAdapter($queue));
        $pager->setMaxPerPage(20);
        $pager->setCurrentPage($request->query->get('page', 1));

        return $this->render('@Juno/Queue/show.html.twig', compact('pager', 'name'));
    }

    /**
     * @param string $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($name)
    {
        $this->pimple['bernard.queue_factory']->remove($name);

        return $this->redirect($this->pimple['router']->generate('juno_queue'));
    }
}
