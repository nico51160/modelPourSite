var xhr = new XMLHttpRequest();

document.getElementById('loading').innerHTML = '<img class="imgLoading" src="img/loading.gif" />';

xhr.onload = function() {
	console.log(xhr);
	var retour = JSON.parse(xhr.response);
	
	document.getElementById('loading').innerHTML = '';
		
	if(retour.msg == undefined) {
	} else {
		document.getElementById('reponse').innerHTML = '<span class="green">'+retour.msg+'</span>';
		document.getElementById('retourDelete').innerHTML = '';
	}

	if(retour.explication == undefined) {
	} else {
		document.getElementById('reponse').innerHTML = '<span class="red">'+retour.explication+'</span>';
		document.getElementById('retourDelete').innerHTML = '';
	}
		
}

var tuto = {
	tutoID: id
}

xhr.open('DELETE','http://127.0.0.1:8080/API_REST/backend/tutos/api/delete',true);
xhr.send(JSON.stringify(tuto));

xhr.onerror = function() {
	document.getElementById('erreur').innerHTML = '<h2>Erreur de transfert</h2>';
}