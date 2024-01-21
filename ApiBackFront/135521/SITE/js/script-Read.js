var xhr = new XMLHttpRequest();

document.getElementById('loading').innerHTML = '<img src="img/loading.gif" />';

xhr.onload = function() {
	var tuto = JSON.parse(this.responseText);
	
	document.getElementById('loading').innerHTML = '';


		var afficherTuto = '<div class="items modif"><h2>'+tuto.titre+'</h2><p><a href="index.html">Retour</a></p><p>'+tuto.description+'</p><p><a href="'+tuto.url+'">Accès au tuto</a></p></div>';
		document.getElementById('conteneur').innerHTML = afficherTuto;
}


xhr.open('GET','http://127.0.0.1:8080/API_REST/backend/tutos/api/read/'+id+'',true);
xhr.send();

xhr.onerror = function() {
	document.getElementById('erreur').innerHTML = '<h2>Erreur de transfert</h2>';
}