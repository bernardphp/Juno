<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/henrikbjorn/raekke/vendor/autoload.php';

$app = new Juno\Application(__DIR__ . '/../', true);
$app->inject(array(
    'routing.resource' => 'config/routing.xml',
    'twig.path' => __DIR__ . '/../views',
));
$app->run();
