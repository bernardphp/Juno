<?php

namespace Juno\Provider;

use Bernard\Serializer\SymfonySerializer;
use Bernard\Symfony\EnvelopeNormalizer;
use Juno\Twig\CodeExtension;
use Juno\Twig\JunoExtension;
use Silex\Application;
use Juno\Navigation;

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
            $twig->addExtension(new JunoExtension($app['juno.navigation']));

            return $twig;
        }));

        $app['twig.loader.filesystem'] = $app->share($app->extend('twig.loader.filesystem', function ($loader) {
            $loader->addPath(__DIR__ . '/../Resources/views', 'Juno');

            return $loader;
        }));

        $app['juno.navigation'] = $app->share(function () {
            return new Navigation;
        });
    }

    /**
     * {@inheritDoc}
     */
    public function boot(Application $app)
    {
    }
}
