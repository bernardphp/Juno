<?php

namespace Juno\Provider;

use Juno\Twig\CodeExtension;
use Bernard\Connection;
use Bernard\QueueFactory;
use Bernard\Serializer;
use Silex\Application;

/**
 * @package Juno
 */
class BernardServiceProvider implements \Silex\ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Application $app)
    {
        $app['jms_serializer.builder'] = $app->share($app->extend('jms_serializer.builder', function ($builder) {
            $r = new \ReflectionClass('Bernard\Connection');
            $builder->addMetadataDir(dirname($r->getFilename()) . '/Resources/serializer', 'Bernard');

            return $builder;
        }));

        $app['bernard.serializer'] = $app->share(function ($app) {
            return new Serializer\Serializer($app['jms_serializer']);
        });

        $app['bernard.connection'] = $app->share(function ($app) {
            return new Connection($app['predis']['bernard']);
        });

        $app['bernard.queue_factory'] = $app->share(function ($app) {
            return new QueueFactory\QueueFactory($app['bernard.connection'], $app['bernard.serializer']);
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
