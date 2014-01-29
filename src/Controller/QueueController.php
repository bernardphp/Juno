<?php

namespace Juno\Controller;

use Silex\Application;

class QueueController
{
    public function indexAction(Application $app, $_accept = '')
    {
        return $app->json(array(
            'proxy-analysis'  => 20,
            'send-newsletter' => 100,
            'failure'         => 1,
            'high'            => 12323,
        ));
    }

    public function showAction(Application $app, $queue)
    {
        return $app->json(array(
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
            array('timestamp' => time(), 'name' => 'Import', 'retries' => 0, 'class' => 'Bernard\Message\DefaultMessage', 'arguments' => array()),
        ));
    }
}
