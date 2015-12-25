//loginscript

if (window.XMLHttpRequest){
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp = new XMLHttpRequest();
}else{
	// code for IE6, IE5
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
console.log(xmlhttp);

	function login(){

		if(document.getElementById("username").value != "" && document.getElementById("password").value != ""){

			var usernameI = document.getElementById("username").value;
			var passwordI = document.getElementById("password").value;
			var sessionID;	

			xmlhttp.open("GET", "/php/login.php?username="+usernameI+"&password="+passwordI , true);
			xmlhttp.send();
			var timeOut = 0;

			xmlhttp.onreadystatechange = function () {

			    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			    	var response = xmlhttp.responseText.substring(0,7);

			    	if(response == "VALID.."){

			    		var sessionIDtemp = xmlhttp.responseText.substring(7,17);
			    		sessionID = parseInt(sessionIDtemp);
			    		console.log(sessionID);

				        if (sessionID >= 1000000000 && sessionID <= 9999999999 ) { //if (xmlhttp.responseText >= 1000000000 && xmlhttp.responseText <= 9999999999 )

				        	//Valid credentials
				        	console.log("LOGIN_NOTIFICATION: Successfull");
				        	document.getElementById("loginNotification").style.color = "090";
				        	clearInputArea();	
				        	document.getElementById("loginNotification").innerHTML = "Valid credentials";

				        } else {

				        	//Invalid response
				        	console.log("LOGIN_ERROR: Invalid response from server");

				        }

				    } else if(response == "INVALID"){

				    	//invalid credentials
				    	console.log("LOGIN_NOTIFICATION: Invalid credentials");
				    	document.getElementById("loginNotification").style.color = "c00";
				    	document.getElementById("loginNotification").innerHTML = "Invalid credentials!";

				    } else if (response == "ERROR.."){

				    	//server error
				    	console.log("LOGIN_ERROR: Server error");

				    } else {

				    	//communication error with server
				    	console.log("LOGIN_ERROR: Communication error with server");
				    	document.body.innerHTML = xmlhttp.responseText;

				    }

			    } else {

			    	if(timeOut > 14){
			    		console.log("LOGIN_ERROR: Slow or no response from server");
			    	} else {
			    		timeOut++;
			    	}
			    }

			    /*xmlhttp.open("lue||GET", "ajaxlogin.php?sessionID=" + sessionID, true);
			    xmlhttp.send();*/

			    //setCookie("sessionID", sessionID, undefined);

			}

		} else {
			document.getElementById("loginNotification").style.color = "c00";
			document.getElementById("loginNotification").innerHTML = "You must fill out both username and password";
		}

	}