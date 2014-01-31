<?php

namespace Juno\Controller;

use Silex\Application;

class InfoController
{
    public function indexAction(Application $app)
    {
        $config = $app['bernard.config'];
        $driver = array();

        return json_encode(compact('config', 'driver'), JSON_FORCE_OBJECT);
    }
}
