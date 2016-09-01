function getXMLHttpRequest() {
	var xhr = null;

	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest();
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}

	return xhr;
}

var xhr = getXMLHttpRequest();
setInterval(function() {

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			readNumber(xhr.responseText)
		}
	};
	xhr.open("GET", "call_bdd.php", true)
	xhr.send(null)
}, 1000)

function readNumber(nb) {
	console.log(nb);
	if (nb == '012345') {
		window.location.replace("raidy.php")
	}
	if (nb == '0')
		document.getElementById("players").innerHTML = "1 / 6";
	if (nb == '01')
		document.getElementById("players").innerHTML = "2 / 6";
	if (nb == '012')
		document.getElementById("players").innerHTML = "3 / 6";
	if (nb == '0123')
		document.getElementById("players").innerHTML = "4 / 6";
	if (nb == '01234')
		document.getElementById("players").innerHTML = "5 / 6";
}
