<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@yield('styles')
		<link type="text/css" rel="stylesheet" href=""/>
		<meta charset="utf-8"/>
		<style>
			body{
				font-family: sans-serif;
			}
		</style>
	</head>


	<body>
		@yield('content')
	</body>
	
</html>