let body = document.querySelector('body');

// Affichage d'une image de fond aléatoire
    window.addEventListener('load', function() {
        let imgMini = 10;
        let imgMaxi = 14;
        let image   = F_imageAleatoire(imgMini, imgMaxi);
        body.style.backgroundImage = `url(fond/${image}.jpg)`;
    });

// Fonction image aléatoire
    let F_imageAleatoire = (mini, maxi) => {
        let aleatoire = Math.round(Math.random() * (maxi - mini) + mini);
        return aleatoire;
    };