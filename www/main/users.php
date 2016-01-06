<?php

if (session_status() == PHP_SESSION_NONE) {
    	session_start();
}

$permissionRequired = 3;

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

				<table id="users" border="1px solid black" style="margin-left:40px; background-color: white; padding: 8px; text-align: center;">

				<tr>

					<td style="min-width: 150px;">username</td>
					<td style="min-width: 60px;">ID</td>
					<td style="min-width: 230px;">email</td>
					<td style="min-width: 60px;">Permission</td>
					<td style="min-width: 70px;">reset password</td>
					<td style="min-width: 70px;">disable/enable</td>

				</tr>';

				$query = "SELECT * FROM users";

				$qRequest = mysqli_query($dbc, $query)
				or die("Query error: " . mysqli_error());

				while($response = mysqli_fetch_array($qRequest)){
					echo'
				<tr>

					<td>' . $response['username'] . '</td>
					<td>' . $response['id'] . '</td>
					<td>' . $response['email'] . '</td>
					<td>'; if($response['permission'] == 3){echo"admin";}elseif($response['permission'] == 2){echo"mod";}elseif($response['permission'] == 1){echo"normal";} echo'</td>
					<td><form action="usersM.php" method="post"><input hidden value="resetPW"><input hidden value="' . $response['id'] . '"><button type="submit" style="margin-top: 6px; background-color: white;">reset pw</button></form></td>
					<td>'; if($response['enaOrDisa'] == 1){ echo' <div style="width: 20px; height: 10px border-radius: 10px; background-color: green;"';} else{echo' <div style="width: 20px; height: 10px border-radius: 10px; background-color: red;"';}
					echo '<form action="usersM.php" method="post"><input hidden value="EnaOrDisa"><input hidden value="' . $response['id'] . '"><button type="submit" style="margin-top: 6px; background-color: white;">Enable or disable</button></form></td>
				</tr>';
				}

				echo'

				</table>

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

if(isset($dbc))	{
	mysqli_close($dbc);
}
?>