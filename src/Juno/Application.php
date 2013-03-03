<?php

namespace Juno;

use Juno\Provider\SerializerServiceProvider;
use Juno\Provider\JunoServiceProvider;
use Raekke\Silex\RaekkeServiceProvider;
use Predis\Silex\PredisServiceProvider;

/**
 * @package Juno
 */
class Application extends \Flint\Application
{
    public function __construct($rootDir, $debug = false)
    {
        parent::__construct($rootDir, $debug);

        $this->register(new PredisServiceProvider);
        $this->register(new RaekkeServiceProvider);
        $this->register(new JunoServiceProvider);
    }
}
