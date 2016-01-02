//javascript

var elementArray = ["main", "about", "login"];

function displayPrimary(element) {

	for(a = 0; elementArray[a]; a++){
		document.getElementById(elementArray[a]).style.display = "none";
	}

	document.getElementById(elementArray[element]).style.display = "inherit";

	if(elementArray[element] == "login"){
		clearInputArea();
		checkSessionStatus();
	}
}


//--------------------login page funcions


function clearInputArea(){
	document.getElementById("username").value = "";
	document.getElementById("password").value = "";
	document.getElementById("loginNotification").innerHTML = "";

	document.getElementById("username").focus();
}