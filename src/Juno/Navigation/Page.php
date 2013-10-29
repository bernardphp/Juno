<?php

namespace Juno\Navigation;

/**
 * @package Juno
 */
class Page
{
    protected $name;
    protected $routes;

    /**
     * @param string $name
     * @param array  $routes
     */
    public function __construct($name, array $routes)
    {
        $this->name = $name;
        $this->routes = $routes;
    }

    /**
     * Returns the primary route which is the first in the array.
     *
     * @return string
     */
    public function getRoute()
    {
        return reset($this->routes);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $route
     * @return Boolean
     */
    public function isActive($route)
    {
        return in_array($route, $this->routes);
    }
}
