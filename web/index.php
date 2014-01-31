<?php

namespace Juno;

require __DIR__ . '/../vendor/autoload.php';

$app = create_application(true);
$app->register(new \Silex\Provider\DoctrineServiceProvider, array(
    'dbs.options' => array (
        'bernard' => array(
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'dbname'    => 'bernard',
            'user'      => 'root',
            'password'  => null,
            'charset'   => 'utf8',
        ),
    ),
));
$app['bernard.options'] = array(
    'driver' => 'doctrine',
);
$app->run();
