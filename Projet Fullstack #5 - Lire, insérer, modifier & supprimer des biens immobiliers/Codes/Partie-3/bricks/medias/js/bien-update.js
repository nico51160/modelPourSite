let h1          = document.querySelector('header h1');
let button      = document.querySelector('header button');
let imgBricks   = document.querySelector('.imgBricks');
let h3          = document.querySelector('#box-update h3');
let bien        = document.getElementById('bien');
let fichier     = document.getElementById('fichier');
let p           = document.querySelector('#upload p');
let plateforme  = document.getElementById('plateforme');
let submit      = document.querySelector('#submit input');
let reponse     = document.getElementById('reponse');
let sectionLoad = document.getElementById('sectionLoad');


// FonctionReponse
let FonctionReponse = (rep) => {
    let json = JSON.parse(rep); 

    h1.innerHTML    = json.bien;
    imgBricks.style = 'background-image:url(medias/uploads/'+json.image+')';
    h3.innerHTML    = 'modifier le bien ' +json.bien;
    bien.value      = json.bien;
    p.innerHTML     = '<strong>Fichier actuel:</strong> '+json.image;

    sectionLoad.classList.remove('active'); 
}

// FonctionReponseAfficherPlateforme
let FonctionReponseAfficherPlateforme = (rep) => {
    plateforme.innerHTML = '<option value="0">Liste des plateformes</option>';
    let json = JSON.parse(rep);
    for(let i = 0; i < json.length; i+=1) {
        let selected;
        if(json[i].plateformeID == json[i].IDPlateforme) {
            selected = 'selected';
        } else {
            selected = '';
        }
        plateforme.innerHTML += '<option '+selected+' value="'+json[i].plateformeID+'">'+json[i].plateforme+'</option>';
    }  
    sectionLoad.classList.remove('active');  
}


// FonctionModifierReponse
let FonctionModifierReponse = (rep) => {
    let json = JSON.parse(rep);   
    reponse.innerHTML = json.msg;
    sectionLoad.classList.remove('active'); 
}

// Afficher le nom du fichier uploadé
fichier.addEventListener('change', function() {
    let image = fichier.files;
    if(fichier.value) {
        p.innerHTML = '<strong>Fichier uploadé:</strong><br>'+image['0']['name'];
    }
});


// Récupérer le paramètre bienID dans l'url
let href  = window.location.href;
let lien = href.split('.html');
let link = lien[0].split('bien-update-');
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

    xhr.open('POST', 'medias/php/bien-update.php')
    xhr.send(data);
}

// FonctionAfficherPlateforme
let FonctionAfficherPlateforme = () => {
    let xhr  = new XMLHttpRequest();

    sectionLoad.classList.add('active');

    let data = new FormData();
    data.append('ID', bienID);

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            // Retour de PHP
            FonctionReponseAfficherPlateforme(this.response);
        }
    });
    xhr.open('POST', 'medias/php/plateforme-update.php');
    xhr.send(data);
}



// Modifier les datas
let FonctionModifier = (bien, plateform, fichier) => {
    let xhr  = new XMLHttpRequest();

    let formulairebienUpdate = document.getElementById('formulaire-bienUpdate');
    let data = new FormData(formulairebienUpdate);
    data.append('ID', bienID);
    data.append('bien', bien);
    data.append('plateforme', plateform);
    data.append('fichier', fichier);

    sectionLoad.classList.add('active');

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            // Retour de PHP
            FonctionModifierReponse(this.response);
        }
    });

    xhr.open('POST', 'medias/php/bien-update2.php');
    xhr.send(data);
}



// Vérouiller et dévérouiller le formulaire
let valider = () => {   
    if(bien.value) {
        submit.disabled = false;        
    } else {
        submit.disabled = true;
    }
}

bien.addEventListener('change', valider);


// Au chargement de la page
window.addEventListener('load' , function() {
    FonctionData();
    FonctionAfficherPlateforme();
});

// Bouton revenir à la page précédente
button.addEventListener('click', function() {
    this.href = history.back();
    FonctionAfficherBien(); // Fonction disponible dans bien-readAll.js
});


// Valider le formulaire
submit.addEventListener('click', function(e) {
    e.preventDefault();
    let image = fichier.files;
    FonctionModifier(bien.value, plateforme.value, image['0']);
});