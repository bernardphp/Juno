<?php

namespace Juno;

require __DIR__ . '/../vendor/autoload.php';

$app = create_application(true);
$app->register(new \Silex\Provider\DoctrineServiceProvider);
$app['dbs.options'] = array(
    'bernard' => array(
        'dbname' => 'bernard',
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'user' => 'root',
        'oassword' => null,
    )
);
$app['bernard.options'] = array(
    'driver' => 'doctrine',
);
$app->run();
