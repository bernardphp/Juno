<?php

namespace Juno\Controller;

use Silex\Application;

class QueueController
{
    public function indexAction(Application $app, $_format = '')
    {
        return json_encode(array(
            'proxy-analysis'  => 20,
            'send-newsletter' => 100,
            'failure'         => 1,
            'high'            => 12323,
        ), JSON_FORCE_OBJECT);
    }

    public function showAction(Application $app, $queue)
    {
        return $app->json(array(
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array('id' => 1, 'customer' => 'Grundfos')),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
        ));
    }
}
