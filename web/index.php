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
    Bernard\Doctrine\MessagesSchema::create($schema = new Doctrine\DBAL\Schema\Schema);

    array_map(array($db, 'executeQuery'), $schema->toSql($db->getDatabasePlatform()));

    for ($i = 0;$i < rand(1337, 1500);$i++) {
        $app['bernard.producer']->produce(new Bernard\Message\DefaultMessage('ImportUser', array(
            'file' => '/path/to/some/file.csv',
        )));
    }

    for ($i = 0;$i < 133;$i++) {
        $app['bernard.queue_factory']->create('failed')->enqueue(new Bernard\Message\Envelope(new Bernard\Message\DefaultMessage('ImportUser', array(
            'file' => '/path/to/some/file.csv',
        ))));
    }
}

$app->run();
