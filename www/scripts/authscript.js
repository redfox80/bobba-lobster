//loginscript

var sessionID;

	console.log(getCookie("sessionID"));

document.addEventListener('keydown', function(event) {

    if(event.keyCode == 13 && document.getElementById("login").style.display == "inherit") {

        login();

    }
});

if (window.XMLHttpRequest){
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp = new XMLHttpRequest();
}else{
	// code for IE6, IE5
	console.log("ERROR: an error occured, or you are using an unsupported browser")
}
console.log(xmlhttp);

	function login(){

		if(document.getElementById("username").value != "" && document.getElementById("password").value != ""){

			var usernameI = document.getElementById("username").value;
			var passwordI = document.getElementById("password").value;
			var sessionID;	

			xmlhttp.open("GET", "/php/login.php?operation=login&username="+usernameI+"&password="+passwordI , true);
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
				        	setCookie("sessionID", sessionID, 0);
				        	clearInputArea();	
				        	document.getElementById("loginNotification").innerHTML = "Valid credentials";
				        	window.location = "/main";

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

				    } else if(response == "DISA..."){

				    	console.log("LOGIN_NOTIFICATION: Account is disabled");
				    	document.getElementById("loginNotification").style.color = "red";
				    	document.getElementById("loginNotification").innerHTML = "Account is disabled!<br><br>Contact staff for more information";
				    } else {

				    	//communication error with server
				    	console.log("LOGIN_ERROR: Communication error with server");
				    	document.getElementById("loginNotification").style.color = "red";
				    	document.getElementById("loginNotification").innerHTML = xmlhttp.responseText;

				    }

			    } else {

			    	if(timeOut > 14){
			    		console.log("LOGIN_ERROR: Slow or no response from server");
			    	} else {
			    		timeOut++;
			    	}
			    }

			}

		} else {
			document.getElementById("loginNotification").style.color = "c00";
			document.getElementById("loginNotification").innerHTML = "You must fill out both username and password";
		}

	}

	function logout(){

		xmlhttp.open("GET", "/php/login.php?operation=logout&sessionID="+getCookie(sessionID) , true);
		xmlhttp.send();
		var timeOut = 0;

		xmlhttp.onreadystatechange = function () {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

	    		if(xmlhttp.responseText == "done"){
	    			setCookie("sessionID", "null", undefined);
	    			setCookie("PHPSESSID", "", undefined);
	    			window.location = "/";
		   		} else {
		    		document.getElementById("main").innerHTML = xmlhttp.responseText;
		   		}

		   }

		}

	}

	function checkSessionStatus() {
		temp1 = getCookie("PHPSESSID");

		if (temp1 != ""){
			window.location = "/main";
		} else {}
	}


function setCookie(cname, cvalue, exdays) {

    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";

}

function getCookie(cname) {

    var name = cname + "=";
    var ca = document.cookie.split(';');
    
    for(var i=0; i<ca.length; i++) {

        var c = ca[i];

        while (c.charAt(0)==' ') c = c.substring(1);

        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }

    return "";
}