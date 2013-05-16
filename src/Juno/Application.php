<?php

namespace Juno;

use Bernard\Silex\BernardServiceProvider;
use Juno\Provider\JunoServiceProvider;
use Predis\Silex\PredisServiceProvider;
use Silex\Provider\SerializerServiceProvider;

/**
 * @package Juno
 */
class Application extends \Flint\Application
{
    public function __construct($rootDir, $debug = false)
    {
        parent::__construct($rootDir, $debug);

        $this->register(new PredisServiceProvider);
        $this->register(new BernardServiceProvider);
        $this->register(new SerializerServiceProvider);
        $this->register(new JunoServiceProvider);
    }
}
