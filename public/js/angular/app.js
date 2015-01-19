var requires = ['AjaxService', 'TableController', 'TableService'];

if(window.jasmine || window.mocha) {
    requires.push('ngMock');
}

var app = angular.module('app', requires, function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});