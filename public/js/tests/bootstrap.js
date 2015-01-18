
QUnit.angular = {};
QUnit.angular.appModule = angular.module('app');
QUnit.angular.injector  = angular.injector(['ng', 'app']);
QUnit.angular.rootScope = QUnit.angular.injector.get('$rootScope').$new();
