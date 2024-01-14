let bien        = document.getElementById('bien');
let plateform   = document.getElementById('plateforme');
let fichier     = document.getElementById('fichier');
let p           = document.querySelector('#upload p');
let submit      = document.querySelector('#submit input');
let reponse     = document.getElementById('reponse');
let sectionLoad = document.getElementById('sectionLoad');


// Fonction réponse
let FonctionReponse = (rep) => {
    let json = JSON.parse(rep);   
    reponse.innerHTML = json.msg;
    sectionLoad.classList.remove('active'); 
}

// Envoyer les datas
let FonctionEnvoyer = (bien, plateform, fichier) => {
    let xhr  = new XMLHttpRequest();

    let formulaireBienInsert = document.getElementById('formulaire-bienInsert');
    let data = new FormData(formulaireBienInsert);
    data.append('bien', bien);
    data.append('plateforme', plateform);
    data.append('fichier', fichier);

    sectionLoad.classList.add('active');

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            // Retour de PHP
            FonctionReponse(this.response);
        } else if(this.readyState == 4 && this.status == 404) {
            // Déclarer une erreur
            reponse.innerHTML = '<div class="error">Le fichier est introuvale</div>';
        }
    });

    xhr.open('POST', 'medias/php/bien-insert.php');
    xhr.send(data);
}

// Afficher le nom du fichier uploadé
fichier.addEventListener('change', function() {
    let image = fichier.files;
    if(fichier.value) {
        p.innerHTML = '<strong>Fichier uploadé:</strong><br>'+image['0']['name'];
    }
});

// Vérouiller et dévérouiller le formulaire
let valider = () => {   
    if( bien.value && fichier.value ) {
        submit.disabled = false;        
    } else {
        submit.disabled = true;
    }
}

bien.addEventListener('change', valider);
fichier.addEventListener('change', valider);


// Valider le formulaire
submit.addEventListener('click', function(e) {
    e.preventDefault();
    let image = fichier.files;
    FonctionEnvoyer(bien.value, plateform.value, image['0']);
});