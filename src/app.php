<?php

use Juno\Application;

require __DIR__ . '/../vendor/autoload.php';

return new Application($rootDir = __DIR__ . '/..', getenv('SILEX_ENV') == 'dev');
