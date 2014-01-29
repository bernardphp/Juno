<?php

namespace Juno;

use Bernard\Silex\BernardServiceProvider;
use Juno\Provider\JunoControllerProvider;
use Juno\Provider\JunoServiceProvider;
use Silex\Application;

function create_application($debug = false)
{
    $app = new Application(compact('debug'));

    $app->register(new JunoServiceProvider);
    $app->register(new BernardServiceProvider);

    $app->mount('/', new JunoControllerProvider);

    return $app;
}
