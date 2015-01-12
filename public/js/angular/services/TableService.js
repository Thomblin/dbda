angular.module('TableService', []).factory('Table', ['AjaxService', function(AjaxService) {

    return {
        loadDetails : function(name) {
            return AjaxService.get('/table/details/' + name);
        }
    }

}]);
