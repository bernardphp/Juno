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

    Juno.controller('OverviewController', angular.noop);

    Juno.controller('InfoController', ['$scope', 'Info', function ($scope, Info) {
        $scope.info = Info.get();
    }]);

    Juno.controller('QueuesController', ['$scope', '$timeout', 'Queue', function ($scope, $timeout, Queue) {
        $scope.queues = [];

        var timeout;

        (function refresh() {
            Queue.query({}, function (queues) {
                $scope.queues = queues;

                timeout = $timeout(refresh, 2000);
            });
        })();

        $scope.$on('$destroy', function () {
            $timeout.cancel(timeout);
        });
    }]);

    Juno.controller('QueueController', ['$scope', '$routeParams', '$timeout', 'Queue', function ($scope, $routeParams, $timeout, Queue) {
        $scope.page  = parseInt($routeParams.page) || 1;
        $scope.pages = 1;
        $scope.queue = Queue.get({ queue : $routeParams.queue, offset : ($scope.page - 1) * 10 }, function (data) {
            $scope.pages = Math.ceil(data.count / 10);
        });
    }]);

    Juno.controller('ConsumersController', ['$scope', 'Consumer', function ($scope, Consumer) {
        $scope.consumers = Consumer.query();
    }]);

    Juno.config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
        $locationProvider.html5Mode(true);

        $routeProvider.when('/', {
            templateUrl : 'template/overview',
            controller : 'OverviewController'
        });

        $routeProvider.when('/info', {
            templateUrl : 'template/info',
            controller : 'InfoController'
        });

        $routeProvider.when('/queue', {
            templateUrl : 'template/queues',
            controller : 'QueuesController'
        });

        $routeProvider.when('/queue/:queue', {
            templateUrl : 'template/queue',
            controller : 'QueueController'
        });

        $routeProvider.when('/consumer', {
            templateUrl : 'template/consumers',
            controller : 'ConsumersController'
        });

        $routeProvider.otherwise({redirectTo: '/'});
    }]);
})();
