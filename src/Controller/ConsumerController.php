<?php

namespace Juno\Controller;

use Silex\Application;

class ConsumerController
{
    public function indexAction(Application $app)
    {
        return $app->json(array());
    }
}
