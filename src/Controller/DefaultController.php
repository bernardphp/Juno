<?php

namespace Juno\Controller;

use Silex\Application;

class DefaultController
{
    public function indexAction(Application $app)
    {
        return $app['twig']->render('@Juno/layout.html.twig', array(
            'mount_prefix' => $app['juno.mount_prefix'],
            'base_url'     => $app['juno.base_url'],
            'debug'        => $app['debug'],
        ));
    }
}
