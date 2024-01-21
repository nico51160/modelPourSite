var xhr = new XMLHttpRequest();

document.getElementById('loading').innerHTML = '<img src="img/loading.gif" />';

xhr.onload = function() {
	var tutos = JSON.parse(this.responseText);
	console.log(tutos);
	
	document.getElementById('loading').innerHTML = '';
	
	tutos.forEach(function(tuto) {
		var afficherTuto = '<div class="items"><h2>'+tuto.titre+'</h2><p>'+tuto.description.substring(0,200)+'...</p><p><a href="'+tuto.tutoID+'.html">Lire la suite</a></p><p><a href="update-'+tuto.tutoID+'.html">Modifier ce tuto</a> | <a href="delete-'+tuto.tutoID+'.html">Supprimer ce tuto</a></p></div>';
		document.getElementById('conteneur').innerHTML+= afficherTuto;
	});
	
	/*for(var i = 0; i < tutos.length; i++) {
		var afficherTuto = '<div class="items"><h2>'+tutos[i].titre+'</h2><p>'+tutos[i].description.substring(0,200)+'...</p><p><a href="#">Lire la suite</a></p></div>';
		document.getElementById('conteneur').innerHTML+= afficherTuto;
	}*/
}


xhr.open('GET','http://127.0.0.1:8080/API_REST/backend/tutos/api/readAll',true);
xhr.send();

xhr.onerror = function() {
	document.getElementById('erreur').innerHTML = '<h2>Erreur de transfert</h2>';
}