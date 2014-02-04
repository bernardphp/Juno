<?php

namespace Juno;

require __DIR__ . '/../vendor/autoload.php';

$app = create_application(true);
$app['bernard.options'] = array(
    'driver' => 'file',
);
$app->run();
