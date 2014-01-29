<?php

namespace Juno\Controller;

use Silex\Application;

class InfoController
{
    public function indexAction(Application $app)
    {
        return $app->json(array());
    }

    public function driverAction(Application $app)
    {
        return $app->json(array());
    }
}
