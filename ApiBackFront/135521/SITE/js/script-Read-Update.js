var xhr = new XMLHttpRequest();

document.getElementById('loading').innerHTML = '<img class="imgLoading" src="img/loading.gif" />';

xhr.onload = function() {
	var tuto = JSON.parse(this.responseText);
	
	document.getElementById('loading').innerHTML = '';
		
		var afficherTuto = '<form method="post" action=""><input type="text" name="titre" placeholder="Titre" value="'+tuto.titre+'" /><textarea name="description" placeholder="Description">'+tuto.description+'</textarea><input type="text" name="url" placeholder="URL" value="'+tuto.url+'" /><input type="submit" name="valider" value="Modifier" /></form>';
		
		
		document.getElementById('formulaire').innerHTML = afficherTuto;
}


xhr.open('GET','http://127.0.0.1:8080/API_REST/backend/tutos/api/read/'+id+'',true);
xhr.send();

xhr.onerror = function() {
	document.getElementById('erreur').innerHTML = '<h2>Erreur de transfert</h2>';
}