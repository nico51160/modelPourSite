/****** Liste des variables */
let etoiles     = document.querySelectorAll('article section i');
let note        = document.getElementById('note');
let p           = document.querySelector('article section p');
let valider     = document.getElementById('valider');
let commentaire = document.getElementById('commentaire');
let erreur      = document.getElementById('erreur');
/****** Liste des variables */
/***************************/


/****** Script étoiles */
for(etoile of etoiles) {
    etoile.addEventListener('mouseover', function() {
        this.classList.add('dessus');
    });
    etoile.addEventListener('mouseout', function() {
        this.classList.remove('dessus');
    });
    etoile.addEventListener('click', function(){
        erreur.innerText = '';
        for(etoile of etoiles) {
            etoile.classList.remove('active');
        }
        this.classList.add('active');
        note.value = this.dataset.valeur;
        for(let i = 0; i < (note.value)-1; i+=1) {
            etoiles[i].classList.add('active');
        }

        let info;
        switch(note.value) {
            case '1':
                info = 'Très mauvais, je ne recommande pas.';
                break;
            case '2':
                info = 'Mauvais, de nombreux problèmes.';
                break;
            case '3':
                info = 'Moyen, à améliorer.';
                break;
            case '4':
                info = 'Bien, aucun problème à signaler.';
                break;
            case '5':
                info = 'Très bien, je recommande.';
                break;
        }
        p.innerText = info;
    });
}
/****** Script étoiles */
/***************************/


/****** Validation du formulaire */
let Compter = () => {
    let ecrit  = commentaire.value.length;
    let calcul = 250 - ecrit;
    if(calcul < 0) {
        erreur.innerText = 'Attention, 250 caractères maximum pour votre commentaire';
        return false;
    } else {
        erreur.innerText = '';
        return true;
    }
}

commentaire.addEventListener('keyup', function() {
    erreur.innerText = '';
    Compter();
});

valider.addEventListener('click', function(e) {
    if(note.value == '') {
        erreur.innerText = "Merci d'indiquer une note";
        e.preventDefault();
    } else if(commentaire.value == '') {
        erreur.innerText = "Merci de donner votre commentaire";
        e.preventDefault();
    } else if (Compter() === false) {
        e.preventDefault();
    }
});
/****** Validation du formulaire */
/***************************/