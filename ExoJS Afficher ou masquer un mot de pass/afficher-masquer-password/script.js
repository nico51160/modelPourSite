let login      = document.getElementById('login');
let pass       = document.getElementById('pass');
let entrer     = document.getElementById('entrer');
let voirPass   = document.getElementById('voirPass');
let info       = document.getElementById('info');
let formulaire = document.getElementById('formulaire');


// Ouvrir et fermer l'oeil du Password
voirPass.addEventListener('click', function() {
    if(this.classList[1] == "fa-eye-slash") {
        this.classList.replace('fa-eye-slash', 'fa-eye');
        pass.type = "text";
    } else {
        this.classList.replace('fa-eye', 'fa-eye-slash');
        pass.type = "password";
    }

});


// Contrôle de validation du formulaire
        let valider = () => {
            if(login.value && pass.value) {
                entrer.disabled = false;
            } else {
                entrer.disabled = true;
            }
        }

        login.addEventListener('keyup', function(){
            valider();
        });

        pass.addEventListener('keyup', function(){
            valider();
        });
