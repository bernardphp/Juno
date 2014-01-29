<?php

namespace Juno\Provider;

use Silex\Application;
use Juno\EventListener\AcceptListener;

class JunoServiceProvider implements \Silex\ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['dispatcher'] = $app->share($app->extend('dispatcher', function ($dispatcher, $app) {
            $dispatcher->addSubscriber(new AcceptListener);

            return $dispatcher;
        }));
    }

    public function boot(Application $app)
    {
    }
}
