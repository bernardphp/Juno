<?php

namespace Juno\Controller;

use Silex\Application;

class InfoController
{
    public function indexAction(Application $app)
    {
        $config = $app['bernard.config'];

        return $app->json(array(
            'config' => $app['bernard.config'],
            'driver' => array(),
        ));
    }
}
