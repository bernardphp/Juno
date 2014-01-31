<?php

namespace Juno\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController
{
    public function indexAction()
    {
        return file_get_contents(__FILE__, null, null, __COMPILER_HALT_OFFSET__);
    }

    public function templateAction($name)
    {
        filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!is_file($file = __DIR__ . '/../Resources/views/' . $name . '.html')) {
            throw new NotFoundHttpException();
        }

        return file_get_contents($file);
    }
}

__halt_compiler();
<!DOCTYPE html>
<html ng-app="Juno">
    <head>
        <title>Overview - Juno</title>
        <base href="/" />

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link rel="stylesheet" href="/juno/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="/juno/app.css" />
    </head>

    <body ng-controller="DefaultController">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" class="navbar-toggle" ng-click="isCollapsed = !isCollapsed">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <a class="navbar-brand" href="/">Juno</a>
                </div>
            </div>
        </div>

        <div class="navbar navbar-juno navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-collapse" ng-class="{'collapse' : !isCollapsed }">
                    <ul class="nav navbar-nav">
                        <li ng-class="{ 'active' : route.current.controller == 'OverviewController' }">
                            <a ng-href="/"><span class="glyphicon glyphicon-dashboard"></span> Overview</a>
                        </li>

                        <li ng-class="{ 'active' : ['QueueController', 'QueuesController'].indexOf(route.current.controller) != -1 }">
                            <a ng-href="/queue"><span class="glyphicon glyphicon-film"></span> Queues</a>
                        </li>

                        <li ng-class="{ 'active' : route.current.controller == 'ConsumersController' }">
                            <a ng-href="/consumer"><span class="glyphicon glyphicon-cog"></span> Consumers</a>
                        </li>

                        <li ng-class="{ 'active' : route.current.controller == 'FailedController' }">
                            <a ng-href="/queue/failed"><span class="glyphicon glyphicon-warning-sign"></span> Failed</a>
                        </li>

                        <li ng-class="{ 'active' : route.current.controller == 'InfoController' }">
                            <a ng-href="/info"><span class="glyphicon glyphicon-info-sign"></span> Info</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container" ng-view></div>

        <div class="container">
            <p class="text-center muted-text">
                There needs to be a logo of bernard on this page with a link to the website. Needs colors that are
                similiar to the ones found in the Bernard logo.
            </p>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular-route.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular-resource.js"></script>
        <script src="/juno/app.js"></script>
        <script src="/juno/utils.js"></script>
    </body>
</html>
