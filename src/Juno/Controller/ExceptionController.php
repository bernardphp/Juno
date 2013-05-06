<?php

namespace Juno\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * @package Juno
 */
class ExceptionController extends \Flint\Controller\ExceptionController
{
    /**
     * {@inheritDoc}
     */
    protected function resolve(Request $request, $code, $format)
    {
        // Apparently the request given here and the one in app.request are not
        // the same.
        $this->pimple['request']->query->remove('_partial');
        $this->pimple['request']->setRequestFormat('html');

        // And for luck and fortune we set it on the given request aswell
        $request->query->remove('_partial');
        $request->setRequestFormat('html');

        return '@Juno/Exception/error.html.twig';
    }
}
