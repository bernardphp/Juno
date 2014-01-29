<?php

namespace Juno;

use Bernard\Silex\BernardServiceProvider;
use Juno\Provider\JunoServiceProvider;
use Silex\Application;
use Silex\Provider\UrlGeneratorServiceProvider;

function create_application($debug = false)
{
    $app = new Application(compact('debug'));
    $app->register(new UrlGeneratorServiceProvider);
    $app->register(new JunoServiceProvider);
    $app->register(new BernardServiceProvider);

    return $app;
}
