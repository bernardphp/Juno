<?php

namespace Juno\Provider;

use Raekke\Connection;
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
        $app['raekke.connection'] = $app->share(function ($app) {
            return new Connection($app['predis']['raekke']);
        });

        $app['raekke.queue_manager'] = $app->share(function ($app) {
            return new QueueManager($app['raekke.connection']);
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
