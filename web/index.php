<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Juno\Application($rootDir = __DIR__ . '/..', false);
$app->inject(array(
    'routing.options' => array(
        'cache_dir' => $rootDir . '/cache/routing',
    ),
    'twig.options' => array(
        'cache' =>false, // $rootDir . '/cache/twig',
    ),
    'predis.clients' => array(
        'raekke' => array(
            'parameters' => 'tcp://localhost',
            'options' => array('prefix' => 'raekke:'),
        ),
    ),
));

$app->run();
