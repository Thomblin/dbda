QUnit.angular.AjaxService = QUnit.angular.injector.get('AjaxService');

QUnit.test("getIncreasesStartedAjaxCounter", function (assert) {
    assert.ok(0 == QUnit.angular.AjaxService.startedAjax, "startedAjax counter should be initialized with zero");

    QUnit.angular.AjaxService.get('/any.html');

    assert.ok(1 == QUnit.angular.AjaxService.startedAjax, "startedAjax counter should be increased by one");
});