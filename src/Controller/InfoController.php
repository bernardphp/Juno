<?php

namespace Juno\Controller;

use Silex\Application;

class InfoController
{
    public function indexAction(Application $app)
    {
        return $app->json(array(
            'info' => array(
                'driver' => 'FlatFile',
            ),
            'driver' => array(),
        ));
    }
}
