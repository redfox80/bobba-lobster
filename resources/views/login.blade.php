@extends('layouts.application')

@section('title')
Login
@endsection



@section('styles')
		<link type="text/css" rel="stylesheet" href="{{ URL::to('/css/login-style.css') }}"/>
		<link type="text/css" rel="stylesheet" media="only screen and (max-device-width: 700px)" href="{{ URL::to('/css/device/med-device-login-style.css') }}" />
@endsection



@section('content')

		<div class="login-content">
			<div class="login-content-text">
				<form>
					<input class="input" type="text" name="username" placeholder="Username" autofocus="true"></input><br/>
					<input class="input" type="password" name="password" placeholder="Password" style="margin-top: 5px;"></input><br>
					<input type="checkbox" name="remember" style="margin-top: 10px;">Remember me</input><br/><br/>
				</form>

				<div class="login-content-buttons">
					<button onclick="document.location='/home';" style="margin-bottom:5px; width: 100%;">Login</button>
					<br/>
					<button style="width: 48.4%;">Recover</button>
					<button style="width: 48.4%;">Register</button>				
				</div>
			</div>
		</div>

@endsection