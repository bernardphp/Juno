<?php

namespace Juno\Controller;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Juno\EnvelopeIterator;

class QueueController
{
    public function indexAction(Application $app, $_format = '')
    {
        $driver = $app['bernard.driver'];
        $queues = array();

        foreach ($app['bernard.driver']->listQueues() as $queue) {
            $queues[] = array('name' => $queue, 'count' => $driver->countMessages($queue));
        }

        return json_encode($queues);
    }

    public function showAction(Application $app, Request $request, $queue)
    {
        $offset = $request->query->get('offset', 1);
        $limit  = $request->query->get('limit', 50);

        $queue = $app['bernard.queue_factory']->create($queue);
        $envelopes = new EnvelopeIterator($queue->peek($offset, $limit));

        return json_encode(array(
            'name' => (string) $queue,
            'count' => $queue->count(),
            'messages' => iterator_to_array($envelopes),
        ));
    }
}
