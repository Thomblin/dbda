@extends('layouts.default')

@section('title')
	Jasmine Spec Runner v2.1.3
@stop

@section('styles')
	<link rel="shortcut icon" type="image/png" href="/tests/jasmine/jasmine_favicon.png">
	<link rel="stylesheet" href="/tests/jasmine/jasmine.css">

	<script src="/tests/jasmine/jasmine.js"></script>
	<script src="/tests/jasmine/jasmine-html.js"></script>
	<script src="/tests/jasmine/boot.js"></script>
@stop

@section('additional_angular_js')
	<script src="/tests/angular-mocks.js"></script>
@stop

@section('additional_js')
	<script src="/tests/services/AjaxServiceTest.js"></script>
@stop
