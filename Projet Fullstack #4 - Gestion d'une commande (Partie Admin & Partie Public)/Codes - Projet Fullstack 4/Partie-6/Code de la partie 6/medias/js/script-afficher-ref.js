let reference = document.getElementById('reference');
let open      = document.getElementById('open');
let loading   = document.getElementById('loading');
let nav       = document.querySelector('#boxRef nav');

// FonctionReponse2
let FonctionReponse2 = (reponse) => {
    reference.innerHTML = '<option value="0">Liste des références</option>';
    let json = JSON.parse(reponse);
    if(json.ref == 'vide') {
        reference.innerHTML = '<option value="0">Pas de référence disponible</option>';
    } else {
        for(let i = 0; i < json.length; i+=1) {
            reference.innerHTML += '<option value="'+json[i].ref+'">'+json[i].ref+'</option>';
        }
    }

    loading.classList.remove('active');
}

// FonctionData2
let FonctionData2 = () => {
    let xhr = new XMLHttpRequest();

    loading.classList.add('active');

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            FonctionReponse2(this.response);
        }
    });

    xhr.open('GET', '/Projets_FullStack/projet-4/medias/php/readAllRef.php');
    xhr.send();
}

// Ouvrir et fermer la zone NAV
open.addEventListener('click', function() {
    this.classList.toggle('active');
    nav.classList.toggle('active');
    FonctionData2();
});