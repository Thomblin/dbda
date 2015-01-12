angular.module('TableService', []).factory('Table', function($http) {

    return {
        loadDetails : function(name) {
            ++startedAjax;
            var promise = $http.get('/table/details/' + name);

            promise.then( function() {
                ++finishedAjax;
            });

            return promise;
        }
    }

});
