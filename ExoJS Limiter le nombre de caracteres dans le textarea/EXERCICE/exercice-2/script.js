// VARIABLES
let formulaire = document.getElementById('formulaire');
let nom        = document.getElementById('nom');
let email      = document.getElementById('email');
let message    = document.getElementById('message');
let info       = document.getElementById('info');
let compter    = document.getElementById('compter');

const MAX = 10;

compter.innerText = MAX;

// FONCTIONS
let valideChamp = () => {
    if(nom.value && email.value && message.value) {
        return true;
    } else {
        info.innerText = "Merci de remplir le formulaire au complet";
        return false;
    }
};

let compterCaractere = () => {
    let ecrit = message.value.length;
    compter.innerText = MAX - ecrit;
    if(ecrit > MAX) {
        message.value = message.value.substring(0, MAX);
        compter.classList.replace('green', 'red');
        info.innerText = `Attention, ${MAX} caractères maximum pour le message`;
        compter.innerText = 0;
        return false;
    } else {
        compter.classList.replace('red', 'green');
        info.innerText = "";
        return true;
    }
};

// COMPTER LE NB DE CARACTERES DU MESSAGE
message.addEventListener('keyup', function() {
    compterCaractere();
});

// VALIDATION DU FORMULAIRE
formulaire.addEventListener('submit', function(e) {
    if(valideChamp() && compterCaractere()) {} else {
        e.preventDefault();
    }
});