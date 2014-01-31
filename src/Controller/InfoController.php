<?php

namespace Juno\Controller;

use Silex\Application;

class InfoController
{
    public function indexAction(Application $app)
    {
        return json_encode(array(
            'driver' => $app['bernard.driver']->info(),
            'config' => $app['bernard.config'],
        ));
    }
}
