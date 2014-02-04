<?php

namespace Juno\Controller;

use Silex\Application;

class InfoController
{
    public function indexAction(Application $app)
    {
        $driver = $app['bernard.driver'];
        $queues = $driver->listQueues();
        $failed = intval($driver->countMessages('failed'));
        $messages = array_sum(array_map(array($driver, 'countMessages'), $queues));

        return $app->json(array(
            'queues'   => count($queues),
            'messages' => $messages - $failed,
            'failed'   => $failed,
            'driver'   => $driver->info(),
            'config'   => $app['bernard.config'],
        ));
    }
}
