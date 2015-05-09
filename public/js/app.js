var app = angular.module('app', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('{%');
    $interpolateProvider.endSymbol('%}');
});

app.controller('appController', ['$scope', function($scope) {
    $scope.nome = 'Ola';
}]);