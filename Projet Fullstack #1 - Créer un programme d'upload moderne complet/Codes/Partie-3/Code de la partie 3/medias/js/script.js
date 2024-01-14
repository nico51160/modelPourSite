/***************** Liste des variables */
let section1      = document.getElementById('section1');
let modale        = document.getElementById('modale');
let modaleContent = document.getElementById('modale-content');
let fermer        = document.querySelector('#modale-content .fa-times-circle');


/***************** Liste des fonctions */
let FonctionEnvoyer = (fichier) => {
    let xhr  = new XMLHttpRequest();
    let data = new FormData();

    data.append('fichier', fichier)

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            console.log(this.response);
        } else if (this.readyState == 4 && this.status == 404) {
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