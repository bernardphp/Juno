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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link rel="stylesheet" href="/juno/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="/juno/app.css" />
    </head>

    <body>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-juno .navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">Juno</a>
                </div>
            </div>
        </div>

        <div class="navbar navbar-juno navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-collapse collapse">
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-film"></span> Queue "proxy-analysis"</h3>
                </div>

                <div class="panel-body">
                    Showing page 1 of 14.
                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50">Timestamp</th>
                            <th width="1">Name</th>
                            <th width="1">Retries</th>
                            <th width="1">Class</th>
                            <th width="">Arguments</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>December 24, 2013 08:35</td>
                            <td>Import</td>
                            <td>0</td>
                            <td><abbr title="Raven\Message\ImportMessage">ImportMessage</abbr></td>
                            <td width="20"><code>&#039;device&#039; =&gt; &#039;Nord1_32&#039;, &#039;path&#039; =&gt; &#039;s3://grundfos-ipump/prod/Nord1_32/2013-12-24/1387870543.4378.json&#039;</code></td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-center">
                    <ul class="pagination pagination-sm">
                        <li><a href="#">less &laquo;</a></li>
                        <li><a href="#">&laquo;&laquo;</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">8</a></li>
                        <li class="active"><a href="#">9</a></li>
                        <li><a href="#">10</a></li>
                        <li><a href="#">11</a></li>
                        <li><a href="#">more &raquo;</a></li>
                        <li><a href="#">&raquo;&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-cog"></span> Configuration</h3>
                        </div>

                        <div class="panel-body">
                            The table shows you current configuration for Bernard.
                        </div>

                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th>Driver</th>
                                    <td>Doctrine</td>
                                </tr>
                                <tr>
                                    <th>Serializer</th>
                                    <td>Simple</td>
                                </tr>
                                <tr>
                                    <th>Prefetch</th>
                                    <td>~</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-cog"></span> Driver</h3>
                        </div>

                        <div class="panel-body">
                            The table shows you the information the driver knows.
                        </div>

                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th width="50%">redis_version</th>
                                    <td>2.2.12</td>
                                </tr>
                                <tr>
                                    <th width="50%">redis_git_sha1</th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th width="50%">redis_git_dirty</th>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th width="50%">arch_bits</th>
                                    <td>64</td>
                                </tr>
                                <tr>
                                    <th width="50%">multiplexing_api</th>
                                    <td>epoll</td>
                                </tr>
                                <tr>
                                    <th width="50%">process_id</th>
                                    <td>1892</td>
                                </tr>
                                <tr>
                                    <th width="50%">uptime_in_seconds</th>
                                    <td>7258719</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <p class="text-center muted-text">
                There needs to be a logo of bernard on this page with a link to the website. Pagination looks awful!
                Code tag needs cleaning up. also messages table is missing bottom border.
            </p>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="/juno/bootstrap/js/bootstrap.js"></script>
        <script src="/juno/app.js"></script>
    </body>
</html>
