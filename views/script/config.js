var app = angular.module('selfAssocite', ['ngRoute']);

app.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'subview/home.html',
    });
    $routeProvider.when('/login', {
        templateUrl: 'subview/login.html'
    });
    $routeProvider.when('/register', {
        templateUrl: 'subview/register.html'
    });
    $routeProvider.otherwise({
        redirectTo: '/'
    });
}]);