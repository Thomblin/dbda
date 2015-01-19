
describe("AjaxService", function() {

    beforeEach(function () {
        module('app');
    });

    it('should be present',
        inject(function (AjaxService) {
            expect(AjaxService).not.toBe(null);
    }));

    it("should initialize startedAjax counter with zero",
        inject(function (AjaxService) {
            expect(AjaxService.startedAjax).toBe(0);
        })
    );

    it("should initialize finishedAjax counter with zero",
        inject(function (AjaxService) {
            expect(AjaxService.finishedAjax).toBe(0);
        })
    );

    describe(".get()", function() {

        var $rootScope, $httpBackend, $q;

        beforeEach(inject(function (_$rootScope_, $controller, _$httpBackend_, _$q_) {
            $httpBackend = _$httpBackend_;
            $rootScope = _$rootScope_;
            $q = _$q_;
        }));

        afterEach(function() {
            $httpBackend.verifyNoOutstandingExpectation();
            $httpBackend.verifyNoOutstandingRequest();
        });

        it("should increase the startedAjax by one",
            inject(function (AjaxService) {
                $httpBackend.expectGET('/any.html').respond(200, {});;
                AjaxService.get('/any.html');
                expect(AjaxService.startedAjax).toBe(1);
                $httpBackend.flush();
            })
        );

        it('should return a promise',
            inject(function (AjaxService) {
                $httpBackend.expectGET('/any.html').respond(200, {any: 'response'});
                expect(AjaxService.get('/any.html', true).then).toBeDefined();
                $httpBackend.flush();
            })
        );

        it("should increase the finishedAjax counter by one when promise returns",
            inject(function (AjaxService) {
                var deferred = $q.defer();
                var promise = deferred.promise;

                $httpBackend.expectGET('/any.html').respond(200, {any: 'response'});

                promise = AjaxService.get('/any.html');
                expect(AjaxService.finishedAjax).toBe(0);

                $httpBackend.flush();
                expect(AjaxService.finishedAjax).toBe(1);
            })
        );

    });
});
