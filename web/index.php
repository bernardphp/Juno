<?php

use Symfony\Component\HttpKernel\Debug\ErrorHandler;

require __DIR__ . '/../vendor/autoload.php';

ErrorHandler::register();

$debug = in_array($_SERVER['REMOTE_ADDR'], array(
    '127.0.0.1',
    'fe80::1',
    '::1',
    '::ffff:127.0.0.1',
));

$app = new Juno\Application($rootDir = __DIR__ . '/..', $debug);
$app->inject(array(
    'routing.resource' => $rootDir . '/src/Juno/Resources/config/routing.xml',
    'predis.clients' => array(
        'raekke' => array(
            'parameters' => array('tcp://localhost', 'tcp://localhost:3307'),
            'options' => array('prefix' => 'raekke:'),
        ),
    ),
));

$app->run();
