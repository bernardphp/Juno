<?php

namespace Juno\Controller;

use Silex\Application;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController
{
    public function indexAction(Application $app)
    {
        return $app['twig']->render('@Juno/layout.html.twig', array(
            'mount_prefix' => $app['juno.mount_prefix'],
            'debug'        => $app['debug'],
        ));
    }

    public function templateAction(Application $app, $name)
    {
        return $app['twig']->render('@Juno/' . $name . '.html.twig');
    }
}
