<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Juno\Twig;

if (!defined('ENT_SUBSTITUTE')) {
    define('ENT_SUBSTITUTE', 8);
}

/**
 * Twig extension relate to PHP code and used by the profiler and the default exception templates.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class CodeExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            'abbr_class'  => new \Twig_Filter_Method($this, 'abbrClass', array('is_safe' => array('html'))),
            'format_args' => new \Twig_Filter_Method($this, 'formatArgs', array('is_safe' => array('html'))),
        );
    }

    public function abbrClass($class)
    {
        $parts = explode('\\', $class);
        $short = array_pop($parts);

        return sprintf("<abbr title=\"%s\">%s</abbr>", $class, $short);
    }

    /**
     * Formats an array as a string.
     *
     * @param array $args The argument array
     *
     * @return string
     */
    public function formatArgs($args)
    {
        $result = array();
        foreach ($args as $key => $item) {
            if ('object' === $item[0]) {
                $parts = explode('\\', $item[1]);
                $short = array_pop($parts);
                $formattedValue = sprintf("<em>object</em>(<abbr title=\"%s\">%s</abbr>)", $item[1], $short);
            } elseif ('array' === $item[0]) {
                $formattedValue = sprintf("<em>array</em>(%s)", is_array($item[1]) ? $this->formatArgs($item[1]) : $item[1]);
            } elseif ('string'  === $item[0]) {
                $formattedValue = sprintf("'%s'", htmlspecialchars($item[1], ENT_QUOTES, $this->charset));
            } elseif ('null' === $item[0]) {
                $formattedValue = '<em>null</em>';
            } elseif ('boolean' === $item[0]) {
                $formattedValue = '<em>'.strtolower(var_export($item[1], true)).'</em>';
            } elseif ('resource' === $item[0]) {
                $formattedValue = '<em>resource</em>';
            } else {
                $formattedValue = str_replace("\n", '', var_export(htmlspecialchars((string) $item, ENT_QUOTES, 'utf-8'), true));
            }

            $result[] = is_int($key) ? $formattedValue : sprintf("'%s' => %s", $key, $formattedValue);
        }

        return implode(', ', $result);
    }

    /**
     * Formats an array as a string.
     *
     * @param array $args The argument array
     *
     * @return string
     */
    public function formatArgsAsText($args)
    {
        return strip_tags($this->formatArgs($args));
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'code';
    }
}
