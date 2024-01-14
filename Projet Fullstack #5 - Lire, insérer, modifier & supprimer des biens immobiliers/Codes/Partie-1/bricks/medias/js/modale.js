let openInsert  = document.querySelector('header button');
let closeInsert = document.querySelector('#box-insert span');
let box         = document.querySelector('.box');
let boxInsert   = document.getElementById('box-insert');
let plateforme  = document.getElementById('plateforme');
let secLoad     = document.getElementById('sectionLoad');


// FonctionReponseAfficherPlateforme
let FonctionReponseAfficherPlateforme = (rep) => {
    plateforme.innerHTML = '<option value="0">Liste des plateformes</option>';
    let json = JSON.parse(rep);
    for(let i = 0; i < json.length; i+=1) {
        plateforme.innerHTML += '<option value="'+json[i].plateformeID+'">'+json[i].plateforme+'</option>';
    }  
    secLoad.classList.remove('active');  
}

// FonctionAfficherPlateforme
let FonctionAfficherPlateforme = () => {
    let xhr  = new XMLHttpRequest();

    secLoad.classList.add('active');

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            // Retour de PHP
            FonctionReponseAfficherPlateforme(this.response);
        }
    });
    xhr.open('GET', 'medias/php/plateforme-readAll.php');
    xhr.send();
}

openInsert.addEventListener('click', function() {
    box.classList.add('active');
    boxInsert.classList.add('animate__backInDown');
    boxInsert.classList.remove('animate__bounceOutUp');
    FonctionAfficherPlateforme();
});

closeInsert.addEventListener('click', function() { 
    let bien    = document.getElementById('bien');
    let fichier = document.getElementById('fichier');
    let reponse = document.getElementById('reponse');
    let p       = document.querySelector('#upload p');
    let submit  = document.querySelector('#submit input');
    bien.value = '';
    fichier.value = '';
    reponse.innerHTML = '';
    p.innerHTML = '';
    submit.disabled = true;

    boxInsert.classList.remove('animate__backInDown');
    boxInsert.classList.add('animate__bounceOutUp');
    setTimeout( function() {
        box.classList.remove('active');
    }, 1000);
});