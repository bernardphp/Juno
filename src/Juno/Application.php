<?php

namespace Juno;

use Bernard\Silex\BernardServiceProvider;
use Juno\Provider\JunoServiceProvider;
use Silex\Provider\SerializerServiceProvider;

/**
 * @package Juno
 */
class Application extends \Flint\Application
{
    public function __construct($rootDir, $debug = false)
    {
        parent::__construct($rootDir, $debug);

        $this->initialize();
    }

    protected function initialize()
    {
        $this->register(new SerializerServiceProvider);
        $this->register(new BernardServiceProvider);
        $this->register(new JunoServiceProvider);
    }
}
