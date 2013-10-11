<?php

namespace Juno\Twig;

use Juno\Navigation;

/**
 * @package Juno
 */
class JunoExtension extends \Twig_Extension
{
    protected $navigation;

    /**
     * @param Navigation $navigation
     */
    public function __construct(Navigation $navigation)
    {
        $this->navigation = $navigation;
    }

    /**
     * {@inheritdoc}
     */
    public function getGlobals()
    {
        return array(
            'juno_navigation' => $this->navigation,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'juno';
    }
}
