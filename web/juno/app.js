var Juno = angular.module('Juno', ['ngRoute', 'ngResource']);

Juno.factory('Queue', ['$resource', function ($resource) {
    return $resource('queue/:queue.json', {}, {});
}]);

Juno.factory('Consumer', ['$resource', function ($resource) {
    return $resource('consumer.json', {}, {});
}]);

Juno.factory('Info', ['$resource', function ($resource) {
    return $resource('info.json', {}, {});
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
    $scope.queues = Queue.query();
}]);

Juno.controller('QueueController', ['$scope', '$routeParams', 'Queue', function ($scope, $routeParams, Queue) {
    $scope.page  = parseInt($routeParams.page) || 1;
    $scope.queue = Queue.get({ queue : $routeParams.queue }, function (data) {
        $scope.pages = data.count;;
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
