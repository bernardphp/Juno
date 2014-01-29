<?php

namespace Juno\Tests\Controller;

class QueueControllerTest extends \Juno\Tests\WebTestCase
{
    public function testIndexListsQueues()
    {
        $client = $this->createClient();
        $client->request('GET', '/queue.json');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertEquals('application/json', $client->getResponse()->headers->get('Content-Type'));
        $this->assertEquals('{"proxy-analysis":20,"send-newsletter":100,"failure":1,"high":12323}', $client->getResponse()->getContent());
    }

}
