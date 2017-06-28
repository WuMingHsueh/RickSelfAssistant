var app = angular.module('selfAssocite');

app.controller('MainCtrl', ['$location', function ($location) {
    var self = this;

    self.userService = {
        "isLoggedIn": false
    };


    self.logout = function () {

    };
}]);