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
        <title>Overview - Juno</title>

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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-film"></span> Queues</h3>
                </div>

                <div class="panel-body">
                    The list below contains all the registered queues with the number of messages currently in the queue. Select a queue from below to view all messages currently pending on the queue.
                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th width="1">Status</th>
                            <th width="1">Messages</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><a href="#">import</a></td>
                            <td class="text-center"><span class="label label-success">OK</span></td>
                            <td class="text-right">10</td>
                        </tr>
                        <tr>
                            <td><a href="#">project-samples</a></td>
                            <td class="text-center"><span class="label label-success">OK</span></td>
                            <td class="text-right">0</td>
                        </tr>
                        <tr class="failed">
                            <td><a href="#">failed</a></td>
                            <td class="text-center"><span class="label label-warning">WARNING</span></td>
                            <td class="text-right">265</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-cog"></span> Consumers</h3>
                </div>

                <div class="panel-body">
                    The list below shows all currently running consumers.
                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Uptime</th>
                            <th>Process</th>
                            <th width="1">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>/etc/service/import</td>
                            <td>2 months</td>
                            <td>10877</td>
                            <td class="text-center"><span class="label label-success">OK</span></td>
                        </tr>
                        <tr>
                            <td>/etc/service/project-samples</td>
                            <td>2 months</td>
                            <td>10878</td>
                            <td class="text-center"><span class="label label-success">OK</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <p class="text-muted">MIT Licensed and open source over <a href="#">at GitHub</a>. More information at <a href="#">bernardphp.com</a>.</p>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular.min.js"></script>
        <script src="/juno/app.js"></script>
    </body>
</html>
