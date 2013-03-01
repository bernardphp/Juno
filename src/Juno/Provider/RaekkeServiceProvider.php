<?php

namespace Juno\Provider;

use Juno\Twig\CodeExtension;
use Raekke\Connection;
use Raekke\QueueFactory;
use Raekke\Serializer;
use Silex\Application;

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
            $r = new \ReflectionClass('Raekke\Connection');
            $builder->addMetadataDir(dirname($r->getFilename()) . '/Resources/serializer', 'Raekke');

            return $builder;
        }));

        $app['raekke.serializer'] = $app->share(function ($app) {
            return new Serializer\Serializer($app['jms_serializer']);
        });

        $app['raekke.connection'] = $app->share(function ($app) {
            return new Connection($app['predis']['raekke']);
        });

        $app['raekke.queue_factory'] = $app->share(function ($app) {
            return new QueueFactory\QueueFactory($app['raekke.connection'], $app['raekke.serializer']);
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
