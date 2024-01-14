// LISTE DES VARIABLES
    let generer = document.getElementById('generer');
    let pass    = document.getElementById('pass');

    let formulaire = document.getElementById('formulaire');
    let login      = document.getElementById('login');
    let info       = document.getElementById('info');


// ON CLIC SUR LE BOUTON POUR GENERER UN PASSWORD
    generer.addEventListener('click', function(e) {
        e.preventDefault();
        genererPass();
    });


// ON VERIFIE QUE LES CHAMPS DU FORMULAIRE SONT REMPLIS
    formulaire.addEventListener('submit', function(e) {
        if(valideChamp()) {} else {
            e.preventDefault();
        }
    });


// FONCTION GENERER PASSWORD
    let genererPass = () => {
        let caractere = '!?abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        let passAleatoire = '';
        const LONGUEUR = 15;

        for(let i=0; i<LONGUEUR; i+=1) {
            let aleatoire = Math.round(Math.random() *caractere.length);
            passAleatoire += caractere.substring(aleatoire, aleatoire+1);
        }

        pass.value = passAleatoire;
    }

// FONCTION VALIDER CHAMPS DU FORMULAIRE
    let valideChamp = () => {
        if(!login.value) {
            info.innerText = "Merci de créer un Login";
            return false;
        } else if (!pass.value) {
            info.innerText = "Merci de créer un Password";
            return false;
        } else {
            return true;
        }
    }