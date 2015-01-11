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
</head>
<body>
	<div class="welcome">
		<h1>DB Dependency Admin</h1>
		<ul id="maintable">
			@foreach ($tables as $table)
				<li><a href="#" id="table_{{{$table}}}">{{{$table}}}</a></li>
			@endforeach
		</ul>
	</div>
</body>
</html>
