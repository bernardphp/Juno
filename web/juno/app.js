var Juno = null;

(function () {
    "use strict";

    Juno = angular.module('Juno', ['ngRoute', 'ngResource']);

    Juno.factory('Queue', ['$resource', function ($resource) {
        return $resource('queue/:queue.json', {}, {});
    }]);

    Juno.factory('Consumer', ['$resource', function ($resource) {
        return $resource('consumer.json', {}, {});
    }]);

    Juno.factory('Info', ['$resource', function ($resource) {
        return $resource('info.json', {}, {});
    }]);

    Juno.controller('DefaultController', ['$scope', '$route', function ($scope, $route) {
        $scope.isCollapsed = false;
        $scope.route = $route;
    }]);

    Juno.controller('InfoController', ['$scope', 'Info', function ($scope, Info) {
        $scope.info = Info.get();
    }]);

    Juno.controller('QueuesController', ['$scope', 'Queue', function ($scope, Queue) {
        $scope.queues = Queue.query();
    }]);

    Juno.controller('QueueController', ['$scope', '$routeParams', 'Queue', function ($scope, $routeParams, Queue) {
        $scope.page  = parseInt($routeParams.page) || 1;
        $scope.pages = 1;
        $scope.queue = Queue.get({ queue : $routeParams.queue, offset : ($scope.page - 1) * 10 }, function (data) {
            $scope.pages = Math.ceil(data.count / 10);
        });

        $scope.delete = function () {
            Queue.delete({ queue : $routeParams.queue });
        };

    }])

    Juno.controller('FailedController', ['$controller', '$scope', '$routeParams', 'Queue', function ($controller, $scope, $routeParams, Queue) {
        $routeParams.queue = 'failed';
        $controller('QueueController', {
            $scope: $scope, 
            $routeParams: $routeParams, 
            Queue: Queue
        });
    }]);

    Juno.controller('ConsumersController', ['$scope', 'Consumer', function ($scope, Consumer) {
        $scope.consumers = Consumer.query();
    }]);

    Juno.config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
        $locationProvider.html5Mode(true);

        $routeProvider.when('/', {
            templateUrl : 'template/overview',
            name        : 'overview'
        });

        $routeProvider.when('/info', {
            templateUrl : 'template/info',
            controller  : 'InfoController',
            name        : 'info'
        });

        $routeProvider.when('/queue', {
            templateUrl : 'template/queues',
            controller  : 'QueuesController',
            name        : 'queue'
        });

        $routeProvider.when('/queue/failed', {
            templateUrl : 'template/queue',
            controller  : 'FailedController',
            name        : 'failed'
        });

        $routeProvider.when('/queue/:queue', {
            templateUrl : 'template/queue',
            controller  : 'QueueController',
            name        : 'queues'
        });

        $routeProvider.when('/consumer', {
            templateUrl : 'template/consumers',
            controller  : 'ConsumersController',
            name        : 'consumers'
        });

        $routeProvider.otherwise({redirectTo: '/'});
    }]);
})();
