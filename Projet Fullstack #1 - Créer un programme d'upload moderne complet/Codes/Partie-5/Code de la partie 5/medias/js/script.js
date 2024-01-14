/***************** Liste des variables */
let section1      = document.getElementById('section1');
let section2      = document.getElementById('section2');
let section3      = document.getElementById('section3');
let modale        = document.getElementById('modale');
let modaleContent = document.getElementById('modale-content');
let modaleErreur  = document.querySelector('#modale-content p span');
let fermer        = document.querySelector('#modale-content .fa-times-circle');
let div           = document.querySelector('#section2 div');
let input         = document.getElementById('fichier');


/***************** Liste des fonctions */
let FonctionModale = (msg) => {
    modaleErreur.innerText = msg;
    modale.classList.add('error');
    modaleContent.classList.remove('animate__fadeOutUp');
    modaleContent.classList.add('animate__fadeInDown');
    fermer.addEventListener('click', function() {               
        modaleContent.classList.remove('animate__fadeInDown');
        modaleContent.classList.add('animate__fadeOutUp');
        setTimeout( function() {
            modale.classList.remove('error');
        }, 1000);
    });
}

let FonctionReponse = (reponse) => {
    let json     = JSON.parse(reponse);
    let regex    = new RegExp('/');
    let chercher = regex.test(json);
    // console.log(json)
    if(chercher) {
        section2.classList.add('active');       
        div.innerHTML += `<img src="${json}">`;
        section3.classList.remove('active');
    } else {
        section3.classList.remove('active');
        FonctionModale(json);
    }
}

let FonctionEnvoyer = (fichier) => {
    let xhr  = new XMLHttpRequest();
    let data = new FormData();
    section3.classList.add('active');
    data.append('fichier', fichier)

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            // console.log(this.response);
            FonctionReponse(this.response);
        } else if (this.readyState == 4 && this.status == 404) {
            FonctionModale('Le fichier Php est injoignable');
        }
    });

    xhr.open('POST', 'include/upload.php');
    xhr.send(data);
}

let FonctionRecuperer = (fichiers) => {
    for(let i = 0; i < fichiers.length; i+=1) {
       FonctionEnvoyer(fichiers[i]);
    }
}

let over = (e) => {
    e.preventDefault();
    e.target.classList.add('active');
}

let leave = (e) => {
    e.target.classList.remove('active');
}

let drop = (e) => {
    e.preventDefault();
    let fichiers = e.dataTransfer.files;
    FonctionRecuperer(fichiers);
    e.target.classList.remove('active');
}


/***************** Liste des événements */
section1.addEventListener('dragover', over);
section1.addEventListener('dragleave', leave);
section1.addEventListener('drop', drop);

input.addEventListener('change', function() {
    let fichiers = document.getElementById('fichier').files;
    for(let i = 0; i < fichiers.length; i+=1) {
        FonctionEnvoyer(fichiers[i]);
     }
});