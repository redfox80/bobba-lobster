<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		@yield('styles')
		<link type="text/css" rel="stylesheet" href="{{ URL::to('/css/master-stylesheet.css') }}"/>
		<meta charset="utf-8"/>
	</head>


	<body>

		@yield('content')

	</body>

</html>