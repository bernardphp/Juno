<?php

namespace Juno\Provider;

use Raekke\Connection;
use Raekke\QueueManager;
use Raekke\Serializer;
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
        $app['jms_serializer.builder'] = $app->share($app->extend('jms_serializer.builder', function ($builder) {
            $builder->addMetadataDir(__DIR__ . '/../../../vendor/henrikbjorn/raekke/src/Raekke/Resources/serializer', 'Raekke');

            return $builder;
        }));

        $app['raekke.serializer'] = $app->share(function ($app) {
            return new Serializer\Serializer($app['jms_serializer']);
        });

        $app['raekke.connection'] = $app->share(function ($app) {
            return new Connection($app['predis']['raekke']);
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
