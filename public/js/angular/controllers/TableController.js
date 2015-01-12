angular.module('TableController', []).controller('TableController', ['$scope', '$http', 'Table', function($scope, $http, Table) {

    $scope.currentTable = false;
    $scope.tableData = {};

    $scope.loadTableDetails = function (name) {
        $scope.currentTable = false;

        Table.loadDetails(name)
            .success(function (data) {
                $scope.currentTable = name;
                $scope.tableData[name] = data;
            });
    };
}]);