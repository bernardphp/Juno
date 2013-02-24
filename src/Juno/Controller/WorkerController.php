<?php

namespace Juno\Controller;

/**
 * @package Juno
 */
class WorkerController extends \Flint\Controller\Controller
{
    /**
     * @return string
     */
    public function indexAction()
    {
        return $this->render('@Juno/Worker/index.html.twig', array(
            'workers' => array(),
        ));
    }
}
