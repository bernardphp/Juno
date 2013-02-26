<?php

namespace Juno\Controller;

/**
 * @package Juno
 */
class ConsumerController extends \Flint\Controller\Controller
{
    /**
     * @return string
     */
    public function indexAction()
    {
        return $this->render('@Juno/Consumer/index.html.twig', array(
            'consumers' => array(),
        ));
    }
}
