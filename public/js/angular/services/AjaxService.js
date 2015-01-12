// $http wrapper for behat testing purposes

var Ajax = function ($http) {
    return {
        startedAjax: 0,
        finishedAjax: 0,

        get: function (url) {
            ++this.startedAjax;
            var promise = $http.get(url);

            // todo: wrap $http instead of blocking .then()
            promise.then(function () {
                ++this.finishedAjax;
            });

            return promise;
        }
    };
};

angular.module('AjaxService', []).factory('AjaxService', function($http) {
    return Ajax($http);
});