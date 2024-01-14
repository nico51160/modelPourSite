let tableau  = document.getElementById('tableau');
let sectLoad = document.getElementById('sectionLoad');

// FonctionReponseAfficherBien
let FonctionReponseAfficherBien = (rep) => {
    tableau.innerHTML = '<div class="entete bordGauche">bien</div><div class="entete">plateforme</div><div class="entete">update</div><div class="entete bordDroit">delete</div>';
    let json = JSON.parse(rep);
    for(let i = 0; i < json.length; i+=1) {
        tableau.innerHTML += '<div>'+json[i].bien+'</div><div><a href="'+json[i].url+'" target="_blank">'+json[i].plateforme+'</a></div><div><a href="bien-update-'+json[i].bienID+'.html"><span>Modifier le Bien '+json[i].bien+'</span><i class="fa-solid fa-pen-to-square"></i></a></div><div><a href="bien-delete-'+json[i].bienID+'.html"><span>Supprimer le Bien '+json[i].bien+'</span><i class="fa-solid fa-trash-can"></i></a></div>';
    }
    sectLoad.classList.remove('active'); 
}

// FonctionAfficherBien
let FonctionAfficherBien = () => {
    let xhr = new XMLHttpRequest();

    sectLoad.classList.add('active');

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            FonctionReponseAfficherBien(this.response);
        }
    });
    xhr.open('GET', 'medias/php/bien-readAll.php');
    xhr.send();
}

// Au chargement de la page
window.addEventListener('load', function() {
    FonctionAfficherBien();
});