<?php

namespace Juno\Controller;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

class QueueController
{
    public function indexAction(Application $app, $_format = '')
    {
        return json_encode([
            ['name' => 'proxy-analysis', 'count' => 20],
            ['name' => 'send-newsletter', 'count' => 100],
            ['name' => 'failure', 'count' => 1],
            ['name' => 'high', 'count' => 12323],
        ]);
    }

    public function showAction(Application $app, Request $request, $queue)
    {
        $offset = $request->query->get('offset', 1);
        $limit  = $request->query->get('limit', 50);

        // $messages = $app['bernard.driver']->peekQueue($queue, $offset, $limit);
        // $count = $app['bernard.driver']->countMessages($queue);

        return json_encode([
            'name' => $queue,
            'count' => rand(0, 1000),
            'messages' => [
                ['timestamp' => time(), 'name' => 'Import', 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array('id' => 1, 'customer' => 'Grundfos')],
                ['timestamp' => time(), 'name' => 'Import', 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array('id' => 1, 'customer' => 'Grundfos')],
                ['timestamp' => time(), 'name' => 'Import', 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array('id' => 1, 'customer' => 'Grundfos')],
                ['timestamp' => time(), 'name' => 'Import', 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array('id' => 1, 'customer' => 'Grundfos')],
                ['timestamp' => time(), 'name' => 'Import', 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array('id' => 1, 'customer' => 'Grundfos')],
                ['timestamp' => time(), 'name' => 'Import', 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array('id' => 1, 'customer' => 'Grundfos')],
                ['timestamp' => time(), 'name' => 'Import', 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array('id' => 1, 'customer' => 'Grundfos')],
                ['timestamp' => time(), 'name' => 'Import', 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array('id' => 1, 'customer' => 'Grundfos')],
                ['timestamp' => time(), 'name' => 'Import', 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array('id' => 1, 'customer' => 'Grundfos')],
            ]
        ]);
    }
}
