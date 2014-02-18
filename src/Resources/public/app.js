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

    Juno.controller('DefaultController', ['$rootScope', '$route', function ($rootScope, $route) {
        $rootScope.isCollapsed = false;
        $rootScope.route = $route;
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
        $scope.queue = {
            name     : $routeParams.queue,
            messages : []
        };

        Queue.get({ queue : $routeParams.queue, offset : ($scope.page - 1) * 10 }, function (queue) {
            $scope.pages = Math.ceil(queue.count / 10);
            $scope.queue = queue;
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
            templateUrl : 'overview',
            name        : 'overview'
        });

        $routeProvider.when('/info', {
            templateUrl : 'info',
            controller  : 'InfoController',
            name        : 'info'
        });

        $routeProvider.when('/queue', {
            templateUrl : 'queues',
            controller  : 'QueuesController',
            name        : 'queue'
        });

        $routeProvider.when('/queue/failed', {
            templateUrl : 'queue',
            controller  : 'FailedController',
            name        : 'failed'
        });

        $routeProvider.when('/queue/:queue', {
            templateUrl : 'queue',
            controller  : 'QueueController',
            name        : 'queues'
        });

        $routeProvider.when('/consumer', {
            templateUrl : 'consumers',
            controller  : 'ConsumersController',
            name        : 'consumers'
        });

        $routeProvider.otherwise({redirectTo: '/'});
    }]);
})();
