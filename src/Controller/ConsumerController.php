<?php

namespace Juno\Controller;

use Silex\Application;

class ConsumerController
{
    public function indexAction(Application $app)
    {
        $consumers = array(
            '/etc' => array('uptime' => time(), 'running' => true, 'process' => 1),
        );

        return json_encode($consumers, JSON_FORCE_OBJECT);
    }
}
