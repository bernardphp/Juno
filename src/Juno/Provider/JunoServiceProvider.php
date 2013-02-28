<?php

namespace Juno\Provider;

use Juno\Twig\CodeExtension;
use Silex\Application;

/**
 * @package Juno
 */
class JunoServiceProvider implements \Silex\ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Application $app)
    {
        $app['exception_controller'] = 'Juno\\Controller\\ExceptionController::showAction';
        $app['routing.resource'] = __DIR__ . '/../Resources/config/routing.xml';

        $app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
            $twig->addExtension(new CodeExtension);

            return $twig;
        }));

        $app['twig.loader.filesystem'] = $app->share($app->extend('twig.loader.filesystem', function ($loader) {
            $loader->addPath(__DIR__ . '/../Resources/views', 'Juno');

            return $loader;
        }));
    }

    /**
     * {@inheritDoc}
     */
    public function boot(Application $app)
    {
    }
}
