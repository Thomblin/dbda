<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
		}

		.welcome {
			width: 80%;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 20px;
			margin: 16px 0 0 0;
		}
	</style>
	<script src="js/angular/angular.js"></script>
	<script src="js/angular/angular-route.js"></script>
	<script src="js/angular/services/AjaxService.js"></script>
	<script src="js/angular/services/TableService.js"></script>
	<script src="js/angular/controllers/TableController.js"></script>
	<script src="js/angular/app.js"></script>
</head>
<body ng-app="app">
	<div class="welcome">
		<h1>DB Dependency Admin</h1>
		<div ng-controller="TableController">
			<ul id="maintable">
				@foreach ($tables as $table)
					<li><a href="#" id="table_{{{$table}}}" ng-click="loadTableDetails('{{{$table}}}')">{{{$table}}}</a></li>
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
	</div>
</body>
</html>
