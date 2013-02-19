<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/henrikbjorn/raekke/vendor/autoload.php';

$app = new Juno\Application($rootDir = __DIR__ . '/..', true);
$app->inject(array(
    'routing.resource' => $rootDir . '/src/Juno/Resources/config/routing.xml',
    'predis.clients' => array(
        'raekke' => array(
            'parameters' => 'tcp://localhost',
            'options' => array('prefix' => 'raekke:'),
        ),
    ),
));

// Run the thing
$app->run();
