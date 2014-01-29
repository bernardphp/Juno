<?php

namespace Juno\Tests;

use Juno;

class WebTestCase extends \Silex\WebTestCase
{
    public function createApplication()
    {
        $app = Juno\create_application(true);
        $app['exception_handler']->disable();

        return $app;
    }
}
