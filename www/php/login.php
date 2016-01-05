<?php
	
	@$username = $_GET["username"];
	@$password = hash("sha512", $_GET["password"]);
	$loginRES = null;

	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}

	if($_GET['operation'] == "login"){

		if ($username != "" && $password != ""){
			require_once("dbconnect.php");

			$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";

			$qRequest = mysqli_query($dbc, $query)
			or die("Query error: " . mysqli_error());

			$response = mysqli_fetch_array($qRequest);

			if($response['username'] == $username && $response['password'] == $password){
				$loginRES = "VALID";
			} else if( $response['username'] != $username || $response['password'] != $password){
				$loginRES = "INVALID";
			} else {
				$loginRES = "ERROR";
			}
			
		}

		if(isset($loginRES)){
			if($loginRES === "VALID"){

				SESSION_REGENERATE_ID(true);
				$session_id = rand(1000000000, 9999999999);
				$_SESSION['loggedIn'] = true;
				$_SESSION['permission'] = $response['permission'];
				$_SESSION['userID'] = $response['id'];
				mysqli_close($dbc);
				echo "VALID.." . $session_id;

			}  else if($loginRES === "INVALID"){

				mysqli_close($dbc);
				echo "INVALID";

			} else if ($loginRES === "ERROR"){

				mysqli_close($dbc);
				echo "ERROR..";

			} else {

				mysqli_close($dbc);
				echo "SERVER ERROR";

			}

		}

	} else if($_GET['operation'] == "logout"){

		unset($_SESSION['loggedIn'], $_SESSION['permission']);

		session_destroy();
		session_unset();
		echo "done";
	}

?>