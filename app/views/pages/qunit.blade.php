@extends('layouts.default')

@section('title')
	QUnit - dbda test suite
@stop

@section('styles')
	<link rel="stylesheet" href="//code.jquery.com/qunit/qunit-1.16.0.css">
	<script src="//code.jquery.com/qunit/qunit-1.16.0.js"></script>
@stop

@section('content')
	<div id="qunit"></div>
	<div id="qunit-fixture"></div>
@stop

@section('additional_js')
	<script src="/js/tests/bootstrap.js"></script>
	<script src="/js/tests/services/AjaxServiceTest.js"></script>
@stop