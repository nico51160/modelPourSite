let taille = document.getElementById('taille');
let plus   = document.getElementById('plus');
let moins  = document.getElementById('moins');
let info   = document.getElementById('info');
let i      = 14;

let agrandir = () => {
    if(i>=20) {
        i = 20;
    } else {
        i += 1;
    }
    taille.style.fontSize = i+"px";
    info.innerText = `- Taille actuelle: ${i}px`;
}
let reduire = () => {
    if(i<=14) {
        i = 14;
    }else {
        i -= 1;
    }
    taille.style.fontSize = i+"px";
    info.innerText = `- Taille actuelle: ${i}px`;
}


plus.addEventListener('click', function() {
    agrandir();
});
moins.addEventListener('click', function() {
    reduire();
});