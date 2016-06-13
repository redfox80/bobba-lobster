//javascript

if(!getCookie("cookieAgree")){

	var agree = confirm("This website uses cookies to make a smooth experience on this webpage, will you allow this page to use cookies?");

	if(agree == true){
		setCookie("cookieAgree", true, 600);
	} else {
		document.body.innerHTML = "This webpage does not work without cookies, refresh the page and accept cookie agreement to continue";
	}
}

//----------------------------------------------------------

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

//----------------------------MISC


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