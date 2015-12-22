<?php

	$username = $_GET("username");
	$password = md5($_GET("password"));
	$loginRES = null;

	if ($username != "" && $password != ""){
		require_once("dbconnect.php");

		$query = "select * FROM USERS WHERE username = '$username' AND password = '$password' LIMIT 1";

		$qRequest = mysqli_query($dbc, $query)
		or die("Query error: " . mysqli_error());

		$response = mysqli_fetch_array($qRequest);

		if(response['username'] == $username && response['password'] == $password){
			$loginRES = "VALID";
		} else if( response['username'] != $username || response['password'] != $password){
			$loginRES = "INVALID";
		} else {
			$loginRES = "ERROR";
		}
		
	}

	if(isset($loginRES)){
		if($loginRES === "VALID"){

			$session_id = rand(1000000000, 9999999999);
			 echo "VALID.." . $session_id;

		}  else if($loginRES === "INVALID"){

			echo "INVALID";

		} else if ($loginRES === "ERROR"){

			echo "ERROR..";

		} else {

			echo "SERVER ERROR";

		}

	}

?>