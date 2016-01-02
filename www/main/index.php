<?php

if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}

$permissionRequired = 1;

if(@$_SESSION['loggedIn'] == true && $_SESSION['permission'] >= $permissionRequired){

	echo 
'<DOCTYPE html>
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

			<a href=""><div class="button1">Home</div></a>
			<a onclick="logout();"><div class="button1">Logout</div></a>

			<div id="loggedInAs" style="float: right; margin-right: 10px; margin-top: 4px; background-color: #777; border-radius: 5px; padding: 4px;">';

			require_once("../php/dbconnect.php");
				
			$query = "SELECT firstname, lastname FROM users WHERE id = " . $_SESSION['userID'];

			$qRequest = mysqli_query($dbc, $query)
			or die("Query error: " . mysqli_error());

			$response = mysqli_fetch_array($qRequest);

			echo "logged in as: " . $response['firstname'] . " " . $response['lastname'];
echo'
			</div>

		</div>

		<div class="siteholder">

		<br><br>

			<div class="normalElement" id="main">

				Main

			</div>

		<script src="/scripts/mainscript.js"></script>
		<script src="/scripts/authscript.js"></script>
	</body>
</html>
';

} else {
	echo

'
<script src="/scripts/authscript.js"></script>
<center><h1>You do not have permission to view this page</h1></center>
<center><a href="/">Front page</a> <a onclick="logout();" style="cursor: pointer;">Logout</a></center>';
}

mysqli_close($dbc);
?>