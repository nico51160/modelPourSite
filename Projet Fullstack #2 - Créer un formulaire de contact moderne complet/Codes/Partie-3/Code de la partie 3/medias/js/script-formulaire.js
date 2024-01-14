/****** Activer ou désactiver le bouton du formulaire */
    /**** Liste des variables */
    let nom      = document.getElementById('nom');
    let prenom   = document.getElementById('prenom');
    let email    = document.getElementById('email');
    let msg      = document.getElementById('msg');
    let msgError = document.getElementById('msgError');
    let bouton   = document.querySelector('#box-form button');

    /**** Fonction activer ou désactiver le bouton */
    let valider = () => {
        if( nom.value && prenom.value && email.value && msg.value) {
            bouton.disabled = false;
            msgError.innerText = '';
        } else {
            bouton.disabled = true;
            msgError.innerText = 'Merci de remplir tous les champs de ce formulaire';
        }
    }

    /**** Liste des événements */
    nom.addEventListener('keyup', function() {
        valider();
    });
    prenom.addEventListener('keyup', function() {
        valider();
    });
    email.addEventListener('keyup', function() {
        valider();
    });
    msg.addEventListener('keyup', function() {
        valider();
    });
/****** Activer ou désactiver le bouton du formulaire */




/****** Contrôler la qualité des infos entrées dans le formulaire */
    /*** Fonction contrôle nom et prénom */
    let validerString = (valeur, name) => {
        let explication = document.querySelector(`#explication${name}`);
        let controle    = document.querySelector(`#controle${name}`);
        let regex       = /[0-9._?!:;,]+/g;
        let verif       = regex.test(valeur.value);
        if(valeur.value.length < 3) {
            explication.innerText = 'Le '+name.toLowerCase()+' ne peut avoir moins de 3 caractères.';
            explication.classList.add('active');
            valeur.classList.add('bordureRouge');
            valeur.classList.remove('bordureVert');
            controle.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
            controle.classList.add('rouge');
            controle.classList.remove('vert');
            return false;
        } else if(!verif) {
            explication.innerText = '';
            explication.classList.remove('active');
            valeur.classList.remove('bordureRouge');
            valeur.classList.add('bordureVert');
            controle.innerHTML = '<i class="fas fa-check"></i>';
            controle.classList.add('vert');
            controle.classList.remove('rouge');
            return true;
        } else {
            explication.innerText = 'Le '+name.toLowerCase()+' ne semble pas correct.';
            explication.classList.add('active');
            valeur.classList.add('bordureRouge');
            valeur.classList.remove('bordureVert');
            controle.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
            controle.classList.add('rouge');
            controle.classList.remove('vert');
            return false;
        }
    }

    /*** Fonction contrôle email */
    let validerEmail = () => {
        let explication = document.querySelector('#explicationEmail');
        let controle    = document.querySelector('#controleEmail');
        let regex       = /^[a-b0-1.-_]+@[a-b0-1.-_]+\.[a-z]{2,4}$/gi;
        let verif       = regex.test(email.value);
        if(verif) {
            explication.innerText = '';
            explication.classList.remove('active');
            email.classList.remove('bordureRouge');
            email.classList.add('bordureVert');
            controle.innerHTML = '<i class="fas fa-check"></i>';
            controle.classList.add('vert');
            controle.classList.remove('rouge');
            return true;
        } else {
            explication.innerText = 'L\'adresse email ne semble pas correcte.';
            explication.classList.add('active');
            email.classList.add('bordureRouge');
            email.classList.remove('bordureVert');
            controle.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
            controle.classList.add('rouge');
            controle.classList.remove('vert');
            return false;
        }
    }

    /****** Liste des événements */

    /* Contrôle du prénom */
    prenom.addEventListener('change', function() {
        validerString(this, 'Prenom');
    });

    /* Contrôle du nom */
    nom.addEventListener('change', function() {
        validerString(this, 'Nom');
    });

    /* Contrôle de l'email */
    email.addEventListener('change', function() {
        validerEmail();
    });

    /** Contrôle de l'envoi du formulaire */
    bouton.addEventListener('click', function(e) {
        if( validerString(nom,'Nom') && validerString(prenom,'Prenom') && validerEmail() ) {
            let box        = document.getElementById('box');
            let boxReponse = document.getElementById('box-reponse');

            box.classList.add('animate__backOutDown');

            setTimeout( function() {
                box.classList.add('active');
                boxReponse.classList.add('animate__backInLeft');
                boxReponse.classList.add('active');
            }, 1000);
            e.preventDefault();
        } else {
            e.preventDefault();
        }
    })
/****** Contrôler la qualité des infos entrées dans le formulaire */