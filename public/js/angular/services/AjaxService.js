// $http wrapper for behat testing purposes

var Ajax = function ($http) {
    return {
        startedAjax: 0,
        finishedAjax: 0,

        get: function (url) {
            var promise = $http.get(url);
            var self = this;

            ++self.startedAjax;

            // todo: wrap $http instead of blocking .then()
            promise.then(function () {
                ++self.finishedAjax;
            });

            return promise;
        }
    };
};

angular.module('AjaxService', []).factory('AjaxService', function($http) {
    return Ajax($http);
});