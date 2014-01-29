<?php

namespace Juno\Provider;

use Silex\Application;

class JunoControllerProvider implements \Silex\ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/queue.json', 'Juno\Controller\QueueController::indexAction');
        $controllers->get('/queue/{queue}.json', 'Juno\Controller\QueueController::showAction');
        $controllers->get('/consumer.json', 'Juno\Controller\ConsumerController::indexAction');
        $controllers->get('/info.json', 'Juno\Controller\InfoController::indexAction');
        $controllers->get('/info/driver.json', 'Juno\Controller\InfoController::driverAction');

        $controllers->get('/', 'Juno\Controller\DefaultController::indexAction');
        $controllers->get('/{url}', 'Juno\Controller\DefaultController::indexAction')
            ->assert('url', '.+');

        return $controllers;
    }
}
