<?php

use Silex\Provider\DoctrineServiceProvider;

$app = require __DIR__ . '/../src/app.php';

// This test uses Doctrine dbal driver as it is the default.
$app->register(new DoctrineServiceProvider);

// Some tests config values
$app->configure($app['root_dir'] . '/config/config.json');

// Insert some test data if nothing exists yet.
$db = $app['dbs']['bernard'];

if (!$db->getSchemaManager()->tablesExist('bernard_messages')) {
    $queries = explode("\n", file_get_contents($app['root_dir'] . '/config/bernard_messages.sql'));
    $queries = array_filter($queries);

    array_map(array($db, 'executeQuery'), $queries);
}

$app->run();
