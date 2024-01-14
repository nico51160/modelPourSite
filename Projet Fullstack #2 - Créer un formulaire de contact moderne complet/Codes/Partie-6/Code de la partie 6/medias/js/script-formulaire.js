/****** Activer ou désactiver le bouton du formulaire */
    /**** Liste des variables */
    let nom      = document.getElementById('nom');
    let prenom   = document.getElementById('prenom');
    let email    = document.getElementById('email');
    let msg      = document.getElementById('msg');
    let gtoken   = document.getElementById('gtoken');
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
    /*** Fonction Reponse */
    let FonctionReponse = (reponse)=> {
        let error         = document.querySelector('#box-reponse .error');
        let retourReponse = document.querySelector('#box-reponse .retourReponse');

        let json = JSON.stringify(reponse);
        let retour = json.split('\\"');

        if( (retour[1] == 'error') || (retour[3] == 'error') || (retour[5] == 'error') || (retour[7] == 'error') || (retour[9] == 'error') ) {
            error.innerText = "Une erreur est survenue !";
        } else {
            let afficheNom    = retour[1].toUpperCase();
            let chainePrenom1 = retour[3].substr(0,1);
            let chainePrenom2 = retour[3].substr(1);
            let affichePrenom = chainePrenom1.toUpperCase()+chainePrenom2.toLowerCase();

            retourReponse.innerHTML = '<h2>'+affichePrenom+' '+afficheNom+', merci pour votre message</h2><p>Votre message a bien été envoyé.</p><p>Votre demande sera traitée dans les 24 heures ouvrés.</p><p class="info">Vous allez recevoir un accusé de réception de votre demande dans votre boîte mail.<br>Si vous n\'avez rien reçu dans les 10 minutes qui suivent, veuillez vérifier vos courriers indésirables ou bien vos spams.</p><h3><a href="#"><i class="fas fa-home"></i></a></h3>';           
        }       
    }


    /*** Fonction Data */
    let FonctionData = (nom, prenom, email, msg, gtoken) => {
        let xhr  = new XMLHttpRequest();
        let data = new FormData();

        data.append('nom', nom);
        data.append('prenom', prenom);
        data.append('email', email);
        data.append('msg', msg);
        data.append('gtoken', gtoken);

        xhr.addEventListener('readystatechange', function() {
            if(this.readyState == 4 && this.status == 200) {
                // console.log(this.response);
                FonctionReponse(this.response);
            }
        });

        xhr.open('POST', 'test.php');
        xhr.send(data);
    }

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
            
            FonctionData(nom.value, prenom.value, email.value, msg.value, gtoken.value);
            
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