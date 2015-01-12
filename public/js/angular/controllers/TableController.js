angular.module('TableController', []).controller('TableController', ['$scope', 'Table', function($scope, Table) {

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