<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/henrikbjorn/raekke/vendor/autoload.php';

$app = new Juno\Application($rootDir = __DIR__ . '/..', true);
$app['routing.resource'] = $rootDir . '/src/Juno/Resources/config/routing.xml';

// Run the thing
$app->run();
