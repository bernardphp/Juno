var Juno = angular.module('Juno', ['ngRoute', 'ngResource']);

Juno.factory('Queue', ['$resource', function ($resource) {
    return $resource('/queue/:queue.json', {}, {
        all : { method : 'GET', params : {}, isArray : false },
        find : { method : 'GET', params : {}, isArray : true }
    });
}]);

Juno.factory('Consumer', ['$resource', function ($resource) {
    return $resource('/consumer.json', {}, {
        all : { method : 'GET', params : {}, isArray : false }
    });
}]);

Juno.factory('Info', ['$resource', function ($resource) {
    return $resource('/info.json', {}, {});
}]);

Juno.controller('DefaultController', ['$scope', '$route', '$routeParams', function ($scope, $route, $routeParams) {
    $scope.isCollapsed = false;
    $scope.route = $route;
    $scope.routeParams = $routeParams;
}]);

Juno.controller('OverviewController', angular.noop);

Juno.controller('InfoController', ['$scope', 'Info', function ($scope, Info) {
    $scope.info = Info.get();
}]);

Juno.controller('QueuesController', ['$scope', 'Queue', function ($scope, Queue) {
    $scope.queues = Queue.all();
}]);

Juno.controller('QueueController', ['$scope', '$routeParams', 'Queue', function ($scope, $routeParams, Queue) {
    $scope.messages = Queue.find({ queue : $routeParams.queue });
}]);

Juno.controller('FailedController', ['$scope', function ($scope) {
    $scope.messages = [];
}]);

Juno.controller('ConsumersController', ['$scope', 'Consumer', function ($scope, Consumer) {
    $scope.consumers = Consumer.all();
}]);

Juno.config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
    $locationProvider.html5Mode(true);

    $routeProvider.when('/', {
        templateUrl : '/juno/templates/overview.html',
        controller : 'OverviewController'
    });

    $routeProvider.when('/info', {
        templateUrl : '/juno/templates/info.html',
        controller : 'InfoController'
    });

    $routeProvider.when('/queue', {
        templateUrl : '/juno/templates/queues.html',
        controller : 'QueuesController'
    });

    $routeProvider.when('/queue/failed', {
        templateUrl : '/juno/templates/queue.html',
        controller : 'FailedController'
    });

    $routeProvider.when('/queue/:queue', {
        templateUrl : '/juno/templates/queue.html',
        controller : 'QueueController'
    });

    $routeProvider.when('/consumer', {
        templateUrl : '/juno/templates/consumers.html',
        controller : 'ConsumersController'
    });

    $routeProvider.otherwise({redirectTo: '/'});
}]);
