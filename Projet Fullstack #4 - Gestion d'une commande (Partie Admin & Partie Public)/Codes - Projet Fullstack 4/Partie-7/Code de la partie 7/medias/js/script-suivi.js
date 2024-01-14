let refCde   = document.querySelector('#box2 p strong');
let dateCde  = document.querySelector('#box2 p span');
let numCde   = document.querySelector('#sect3 span');

let sect1    = document.getElementById('sect1');
let sect2    = document.getElementById('sect2');
let sect3    = document.getElementById('sect3');

let loading2 = document.getElementById('loading2');

// FonctionReponse5
let FonctionReponse5 = (reponse) => {
    let json = JSON.parse(reponse);

    refCde.innerText = json.ref;
    dateCde.innerText = json.date+ ' par '+json.prenom+' '+json.nom;

    switch(json.etat) {
        case '1':
            sect1.classList.add('active');
            break;
        case '2':
            sect1.classList.add('active');
            sect2.classList.add('active');
            break;
        case '3':
            sect1.classList.add('active');
            sect2.classList.add('active');
            sect3.classList.add('active');
            numCde.innerText = 'Numéro de votre colis: '+json.numero;
            break;
    }
    loading2.classList.remove('active');
}

// FonctionData5
let FonctionData5 = () => {
    let href = window.location.href;
    let url  = new URL(href);
    let ref  = url.searchParams.get('ref');

    let xhr = new XMLHttpRequest();

    loading2.classList.add('active');

    let data = new FormData();
    data.append('reference', ref);

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            FonctionReponse5(this.response);
        }
    });

    xhr.open('POST', '/Projets_FullStack/projet-4/medias/php/suivi.php');
    xhr.send(data);
}

window.addEventListener('load', function() {
    FonctionData5();
});