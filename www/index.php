<DOCTYPE html>
<html>

	<head>

		<title>Project crunge</title>
		<meta charset="utf-8"/>
		<link type="text/css" rel="stylesheet" href="/style.css"/>
	</head>

	<body>

		<noscript>
			Javascript is requiered to use this page properly!
		</noscript>

		<div class="header">

			<h1 id="title"><a href="/">Project crunge</a></h1>

		</div>


		<div class="buttonheader">

			<a onclick="displayPrimary(0);"><div class="button1">Home</div></a>
			<a onclick="displayPrimary(1);"><div class="button1">About</div></a>
			<a onclick="displayPrimary(2);"><div class="button1">Login</div></a>

		</div>

		<div class="siteholder">

		<br><br>

			<div class="normalElement" id="main">

				Main

			</div>

			<div class="normalElement" id="about">

				About

			</div>

			<div class="normalElement" id="login">

				<div class="login">

					<br>
					<input type="text" placeholder="Username" id="username"></input>
					<br><br>
					<input type="password" placeholder="Password" id="password"></input>
					<br><br>
					<button onclick="login();">Login</button>
					<button>Register</button>
					<button onclick="clearInputArea();">clear</button>
					<br><br>
					<p id="loginNotification"></p>

				</div>

			</div>

		</div>



		<script src="/scripts/mainscript.js"></script>
		<script src="/scripts/authscript.js"></script>
	</body>
</html>