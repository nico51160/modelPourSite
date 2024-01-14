/***************** Liste des variables */
let section1 = document.getElementById('section1');


/***************** Liste des fonctions */
let FonctionRecuperer = (fichiers) => {
    for(let i = 0; i < fichiers.length; i+=1) {
        console.log(fichiers[i]['size']);
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