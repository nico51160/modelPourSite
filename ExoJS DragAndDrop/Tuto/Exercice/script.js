/********* Liste des variables */
let supprimer = document.getElementById('supprimer');
let enCours   = document.getElementById('enCours');
let enAttente = document.getElementById('enAttente');
let publier   = document.getElementById('publier');

let modale    = document.getElementById('modale');
let loupes    = document.querySelectorAll('.fa-search-plus');
let fermer    = document.querySelector('.close');
let numArt    = document.querySelector('#content h2 span');


/********* Liste des fonctions */
let start = (e) => {
    e.dataTransfer.setData('text', e.target.id);
}

let over = (e) => {
    e.preventDefault();
    e.target.classList.add('active');
}

let drop = (e) => {
    let id      = e.dataTransfer.getData('text');
    let element = document.getElementById(id);
    e.target.appendChild(element);
    e.target.classList.remove('active');
}

let leave = (e) => {
    e.target.classList.remove('active');
}


/********* Liste des évènements */
supprimer.addEventListener('dragstart', start);
enCours.addEventListener('dragstart', start);
enAttente.addEventListener('dragstart', start);
publier.addEventListener('dragstart', start);

supprimer.addEventListener('dragover', over);
enCours.addEventListener('dragover', over);
enAttente.addEventListener('dragover', over);
publier.addEventListener('dragover', over);

supprimer.addEventListener('drop', drop);
enCours.addEventListener('drop', drop);
enAttente.addEventListener('drop', drop);
publier.addEventListener('drop', drop);

supprimer.addEventListener('dragleave', leave);
enCours.addEventListener('dragleave', leave);
enAttente.addEventListener('dragleave', leave);
publier.addEventListener('dragleave', leave);



/************ MODALE */
for(loupe of loupes) {
    loupe.addEventListener('click', function() {
        modale.classList.add('active');
        numArt.innerHTML = this.getAttribute('id');
    });
    fermer.addEventListener('click', function() {
        modale.classList.remove('active');
    });
}