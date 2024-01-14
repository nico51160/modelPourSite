let h1          = document.querySelector('header h1');
let button      = document.querySelector('header button');
let imgBricks   = document.querySelector('.imgBricks');
let h3          = document.querySelector('#box-update h3');
let submit      = document.querySelector('#submit input');
let reponse     = document.getElementById('reponse');
let sectionLoad = document.getElementById('sectionLoad');


// FonctionSupprimerReponse
let FonctionSupprimerReponse = (rep) => {
    let json = JSON.parse(rep);   
    reponse.innerHTML = json.msg;
    sectionLoad.classList.remove('active'); 
}


// FonctionReponse
let FonctionReponse = (rep) => {
    let json = JSON.parse(rep); 

    h1.innerHTML    = json.bien;
    imgBricks.style = 'background-image:url(medias/uploads/'+json.image+')';
    h3.innerHTML    = 'supprimer le bien ' +json.bien;

    sectionLoad.classList.remove('active'); 
}




// Récupérer le paramètre bienID dans l'url
let href  = window.location.href;
let lien = href.split('.html');
let link = lien[0].split('bien-delete-');
let bienID = link[1];


// FonctionData
let FonctionData = () => {
    let xhr  = new XMLHttpRequest();

    let data = new FormData();
    data.append('ID', bienID);

    sectionLoad.classList.add('active');

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            // Retour de PHP
            FonctionReponse(this.response);
        }
    });

    xhr.open('POST', 'medias/php/bien-read.php')
    xhr.send(data);
}



// Supprimer le Bien
let FonctionSupprimer = () => {
    let xhr  = new XMLHttpRequest();

    let formulairebienDelete = document.getElementById('formulaire-bienDelete');
    let data = new FormData(formulairebienDelete);
    data.append('ID', bienID);

    sectionLoad.classList.add('active');

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            // Retour de PHP
            FonctionSupprimerReponse(this.response);
        }
    });

    xhr.open('POST', 'medias/php/bien-delete.php');
    xhr.send(data);
}



// Au chargement de la page
window.addEventListener('load' , function() {
    FonctionData();
});


// Bouton revenir à la page précédente
button.addEventListener('click', function() {
    this.href = history.back();
    FonctionAfficherBien(); // Fonction disponible dans bien-readAll.js
});


// Valider le formulaire
submit.addEventListener('click', function(e) {
    e.preventDefault();
    FonctionSupprimer();
});