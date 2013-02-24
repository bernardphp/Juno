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
        return $this->render('@Juno/Default/index.html.twig');
    }
}
