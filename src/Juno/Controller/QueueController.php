<?php

namespace Juno\Controller;

use Alex\Pagination\Pager;
use Juno\Pagination\QueueAdapter;
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

        $pager = new Pager(new QueueAdapter($queue));
        $pager->setPerPage(20);
        $pager->setPage($request->query->get('page', 1));

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
