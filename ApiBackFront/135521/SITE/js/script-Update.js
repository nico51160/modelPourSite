var xhr = new XMLHttpRequest();

document.getElementById('loading').innerHTML = '<img class="imgLoading" src="img/loading.gif" />';

xhr.onload = function() {
	
	var retour = JSON.parse(xhr.response);

	document.getElementById('loading').innerHTML = '';
		
	if(retour.msg == undefined) {
	} else {
		document.getElementById('reponse').innerHTML = '<span class="green">'+retour.msg+'</span><p><a href="'+lid+'.html">Voir le tuto</a></p>';
	}

	if(retour.explication == undefined) {
	} else {
		document.getElementById('reponse').innerHTML = '<span class="red">'+retour.explication+'</span><p><a href="update-'+lid+'.html">Retour formulaire</a></p>';
	}

}

var tuto = {
	tutoID: lid,
	titre: letitre,
	description: ladescription,
	url: lurl
}

xhr.open('PUT','http://127.0.0.1:8080/API_REST/backend/tutos/api/update',true);
xhr.send(JSON.stringify(tuto));

xhr.onerror = function() {
	document.getElementById('erreur').innerHTML = '<h2>Erreur de transfert</h2>';
}