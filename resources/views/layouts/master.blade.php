<!DOCTYPE html>
<html>

	<head>
		<title>@yield('title')</title>
		<link type="text/css" rel="stylesheet" href="{{ URL::to('/css/master-stylesheet.css') }}"/>
		@yield('styles')
		<meta charset="utf-8"/>
	</head>


	<body>

		@include('includes.header')

		<div class="content-holder">
			<div class="content-container-left">
				@yield('content')
			</div>

			<div class="content-container-right">
				<h3>Something something</h3>
			</div>
		</div>

	</body>

</html>