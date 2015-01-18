@extends('layouts.default')
@section('title')
    DB Dependency Admin
@stop
@section('content')

    <h1>@yield('title')</h1>
    <div ng-controller="TableController">
        <ul id="maintable">
            @foreach ($tables as $table)
                <li><a href="#" id="table_{{{$table}}}" ng-click="loadTableDetails('{{{$table}}}')">{{{$table}}}</a>
                </li>
            @endforeach
        </ul>
        <div id="tabledetails" ng-if="currentTable">
            <span>table: <%currentTable%></span>

            <div ng-repeat="(column, details) in tableData[currentTable]">
                <div>
                    <strong><%column%></strong>

                    <p>type: <%details.type%></p>
                </div>
            </div>
        </div>
    </div>
@stop
