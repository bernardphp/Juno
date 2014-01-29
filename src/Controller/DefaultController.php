<?php

namespace Juno\Controller;

class DefaultController
{
    public function indexAction()
    {
        return file_get_contents(__FILE__, null, null, __COMPILER_HALT_OFFSET__);
    }
}

__halt_compiler();
<!DOCTYPE html>
<html>
    <head>
        <title>Juno</title>

        <meta charset="utf-8" />

        <link rel="stylesheet" href="/juno/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="/juno/app.css" />
    </head>

    <body>
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Juno</a>
                </div>

                <div class="navbar-collapse collapse">
                </div>
            </div>
        </div>

        <div class="navbar navbar-juno navbar-static-top">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#"><span class="glyphicon glyphicon-dashboard"></span> Overview</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-film"></span> Queues</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-cog"></span> Consumers</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-warning-sign"></span> Failed</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-info-sign"></span> Info</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            <p>Hello</p>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular.min.js"></script>
        <script src="/juno/app.js"></script>
    </body>
</html>
