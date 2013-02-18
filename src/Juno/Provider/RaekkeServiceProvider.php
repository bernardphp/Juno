<?php

namespace Juno\Provider;

use Raekke\Driver\Configuration;
use Raekke\Driver\Connection;
use Raekke\QueueManager;
use Silex\Application;
use Juno\Twig\CodeExtension;

/**
 * @package Juno
 */
class RaekkeServiceProvider implements \Silex\ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Application $app)
    {
        $app['raekke.serializer'] = null;
        $app['raekke.servers'] = array('tcp://localhost');

        $app['raekke.configuration'] = $app->share(function () {
            return new Configuration;
        });

        $app['raekke.connection'] = $app->share(function ($app) {
            return new Connection($app['raekke.servers'], $app['raekke.configuration']);
        });

        $app['raekke.queue_manager'] = $app->share(function ($app) {
            return new QueueManager($app['raekke.connection'], $app['raekke.serializer']);
        });

        $app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
            $twig->addExtension(new CodeExtension);

            return $twig;
        }));
    }

    /**
     * {@inheritDoc}
     */
    public function boot(Application $app)
    {
    }
}
