let etoiles = document.querySelectorAll('article section i');
let note    = document.getElementById('note');
let p       = document.querySelector('article section p');

for(etoile of etoiles) {
    etoile.addEventListener('mouseover', function() {
        this.classList.add('dessus');
    });
    etoile.addEventListener('mouseout', function() {
        this.classList.remove('dessus');
    });
    etoile.addEventListener('click', function(){
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