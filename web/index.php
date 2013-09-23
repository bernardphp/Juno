<?php

use Silex\Provider\DoctrineServiceProvider;

$app = require __DIR__ . '/../src/app.php';

// This test uses Doctrine dbal driver as it is the default.
$app->register(new DoctrineServiceProvider);

$app->configure($app['root_dir'] . '/config/config.json');
$app->run();
