<?php

namespace Juno\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Silex\ControllerProviderInterface;
use Juno\EventListener\AcceptListener;

class JunoServiceProvider implements ServiceProviderInterface, ControllerProviderInterface
{
    public function register(Application $app)
    {
        $app['juno.mount_prefix'] = '/';
    }

    public function boot(Application $app)
    {
        $app->mount($app['juno.mount_prefix'], $this->connect($app));
    }

    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/queue.json', 'Juno\Controller\QueueController::indexAction')
            ->bind('juno_queue_index');

        $controllers->get('/queue/{queue}.json', 'Juno\Controller\QueueController::showAction')
            ->bind('juno_queue_show');

        $controllers->get('/consumer.json', 'Juno\Controller\ConsumerController::indexAction')
            ->bind('juno_consumer_index');

        $controllers->get('/info.json', 'Juno\Controller\InfoController::indexAction')
            ->bind('juno_info_index');

        $controllers->get('/{url}', 'Juno\Controller\DefaultController::indexAction')
            ->bind('juno_homepage')->assert('url', '.{0,}?');

        return $controllers;
    }
}
