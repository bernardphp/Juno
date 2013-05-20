<?php

use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/../vendor/autoload.php';

// allow _method
Request::enableHttpMethodParameterOverride();

$app = new Juno\Application($rootDir = __DIR__ . '/..', false);
$app->inject(array(
    'routing.options' => array(
        'cache_dir' => $rootDir . '/cache/routing',
    ),
    'twig.options' => array(
        'cache' => $rootDir . '/cache/twig',
    ),
    'predis.parameters' => 'tcp://localhost',
    'predis.options' => array('prefix' => 'bernard:'),
));

$app->run();
