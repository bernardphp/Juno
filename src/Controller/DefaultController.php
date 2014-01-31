<?php

namespace Juno\Controller;

use Silex\Application;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController
{
    public function indexAction(Application $app)
    {
        return $this->load($app, 'layout');
    }

    public function templateAction(Application $app, $name)
    {
        return $this->load($app, $name);
    }

    protected function load(Application $app, $name)
    {
        $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        return $app['juno.template_locator']->load($name . '.html');
    }
}
