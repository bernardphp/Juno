<?php

namespace Juno;

use Juno\Navigation\Page;

/**
 * Have a list of Pages that is used to create navigation on the
 * top of Juno.
 *
 * @package Juno
 */
class Navigation
{
    protected $pages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->add('Overview', array('juno_homepage'));
        $this->add('Queues', array('juno_queue', 'juno_queue_show'));
        $this->add('Consumers', array('juno_consumer'));
        $this->add('Failed', array('juno_failed'));
        $this->add('Info', array('juno_info', 'juno_info_driver'), -10);
    }

    /**
     * @param string  $name
     * @param array   $routes
     * @param integer $priority
     */
    public function add($name, $routes = array(), $priority = 10)
    {
        $this->pages[$priority][] = new Page($name, $routes);
    }

    /**
     * @return Item[]
     */
    public function all()
    {
        $pages = $this->pages;

        ksort($pages);

        return array_reduce($pages, function ($a, $b) {
            return $a ? array_merge($b, $a) : $b;
        });
    }
}
