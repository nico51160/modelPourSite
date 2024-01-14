let html  = document.querySelector('html');
let body  = document.querySelector('body');
let barre = document.getElementById('barre');


window.addEventListener('scroll', function() {
    let c      = window.scrollY / (body.clientHeight - html.clientHeight);
    let calcul = Math.round(c * 100);
// Calcul de la progression de la barre horizontale
    barre.style.width = calcul + '%';
});