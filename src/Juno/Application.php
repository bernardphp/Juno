<?php

namespace Juno;

use Juno\Provider\JunoServiceProvider;
use Juno\Provider\RaekkeServiceProvider;

/**
 * @package Juno
 */
class Application extends \Flint\Application
{
    public function __construct($rootDir, $debug = false)
    {
        parent::__construct($rootDir, $debug);

        $this->register(new JunoServiceProvider);
        $this->register(new RaekkeServiceProvider);
    }
}
