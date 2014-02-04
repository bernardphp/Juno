<?php

namespace Juno\Controller;

use Silex\Application;

class InfoController
{
    public function indexAction(Application $app)
    {
        return $app->json(array(
            'driver' => $app['bernard.driver']->info(),
            'config' => $app['bernard.config'],
        ));
    }
}
