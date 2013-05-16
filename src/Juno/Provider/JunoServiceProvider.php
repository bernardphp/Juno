<?php

namespace Juno\Provider;

use Bernard\Serializer\SymfonySerializer;
use Bernard\Symfony\EnvelopeNormalizer;
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

        $app['bernard.serializer'] = $app->share(function ($app) {
            return new SymfonySerializer($app['serializer']);
        });

        $app['serializer.normalizers'] = $app->share($app->extend('serializer.normalizers', function ($normalizers) {
            array_unshift($normalizers, new EnvelopeNormalizer);

            return $normalizers;
        }));

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
