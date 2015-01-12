var startedAjax = 0;
var finishedAjax = 0;

var app = angular.module('app', ['TableController', 'TableService'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});