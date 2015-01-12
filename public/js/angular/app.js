var app = angular.module('app', ['AjaxService', 'TableController', 'TableService'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});