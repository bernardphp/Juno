<?php

namespace Juno\Provider;

use Silex\Application;
use JMS\Serializer\SerializerBuilder;

/**
 * @package Juno
 */
class SerializerServiceProvider implements \Silex\ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Application $app)
    {
        $app['jms_serializer.builder'] = $app->share(function() {
            return new SerializerBuilder();
        });

        $app['jms_serializer'] = $app->share(function ($app) {
            return $app['jms_serializer.builder']->build();
        });
    }

    /**
     * {@inheritDoc}
     */
    public function boot(Application $app)
    {
    }
}
