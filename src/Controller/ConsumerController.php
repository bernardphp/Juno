<?php

namespace Juno\Controller;

use Silex\Application;

class ConsumerController
{
    public function indexAction(Application $app)
    {
        return json_encode([
            ['name' => '/etc/import', 'uptime' => time() - rand(100, 10000), 'running' => true, 'process' => 234],
            ['name' => '/etc/send-emails', 'uptime' => 0, 'running' => false, 'process' => 0],
            ['name' => '/etc/newsletters', 'uptime' => 0, 'running' => false, 'process' => 0],
        ]);
    }
}
