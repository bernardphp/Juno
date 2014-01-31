<?php

namespace Juno\Controller;

use Silex\Application;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController
{
    public function indexAction(Application $app)
    {
        return $this->render($app, 'layout.html', array(
            '%mount_prefix%' => $app['juno.mount_prefix'],
        ));
    }

    public function templateAction(Application $app, $name)
    {
        return $this->render($app, $name . '.html');
    }

    protected function render(Application $app, $template, array $values = array())
    {
        return $app['juno.template_locator']->render($template, $values);
    }
}
