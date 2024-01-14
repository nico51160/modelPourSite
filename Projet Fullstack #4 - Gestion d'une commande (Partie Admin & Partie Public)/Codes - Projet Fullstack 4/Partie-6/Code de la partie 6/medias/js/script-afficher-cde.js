let gerer    = document.getElementById('gerer');
let loading2 = document.getElementById('loading2');
let h1Span = document.querySelector('#box h1 span');
let pSpan  = document.querySelector('#box p span');
const BOX    = document.getElementById('box');
const BOX2   = document.getElementById('box2');

// FonctionReponse3
let FonctionReponse3 = (reponse) => {
    let json = JSON.parse(reponse);

    if(json.vide) {
        BOX.classList.remove('active');
        BOX2.classList.remove('active');
    } else {
        BOX.classList.add('active');
        BOX2.classList.add('active');
        h1Span.innerText = json.ref;
        pSpan.innerText = json.date+' par '+json.prenom+' '+json.nom;

        if(json.numero) {
            num.value = json.numero; // Variable déclarée dans script-admin.js
        } else {
            num.value = '';
        }
    
        switch(json.etat) {
            case '0':
                c1.disabled = false; // Variable déclarée dans script-admin.js
                c1.checked  = false;
                c2.disabled = true;
                c2.checked  = false;
                num.disabled= true;
                c3.disabled = true;
                c3.checked  = false;
                spanC1.classList.remove('orange');
                spanC1.innerText = 'Prendre en charge cette commande';
                spanC2.classList.remove('orange');
                spanC2.innerText = 'Mettre en colis cette commande';
                spanC3.classList.remove('orange');
                spanC3.innerText = 'Envoyer le colis';
                break;
            case '1':
                c1.disabled = true; 
                c1.checked  = true;
                c2.disabled   = false;
                c2.checked  = false;
                num.disabled= true;
                c3.disabled = true;
                c3.checked  = false;
                spanC1.classList.add('orange');
                spanC1.innerText = 'Commande prise en charge';
                spanC2.classList.remove('orange');
                spanC2.innerText = 'Mettre en colis cette commande';
                spanC3.classList.remove('orange');
                spanC3.innerText = 'Envoyer le colis';
                break;
            case '2':
                c1.disabled = true; 
                c1.checked  = true;                
                c2.disabled = true; 
                c2.checked  = true;
                num.disabled= false;
                if(num.value) {
                    c3.disabled = false;
                } else {
                    c3.disabled = true;
                }  
                c3.checked = false;             
                spanC1.classList.add('orange');
                spanC1.innerText = 'Commande prise en charge';
                spanC2.classList.add('orange');
                spanC2.innerText = 'Commande mise en colis';
                spanC3.classList.remove('orange');
                spanC3.innerText = 'Envoyer le colis';
                break;
            case '3':
                c1.disabled = true; 
                c1.checked  = true;               
                c2.disabled = true; 
                c2.checked  = true;               
                num.disabled = true;
                c3.disabled = true; 
                c3.checked  = true;
                spanC1.classList.add('orange');
                spanC1.innerText = 'Commande prise en charge';
                spanC2.classList.add('orange');
                spanC2.innerText = 'Commande mise en colis';
                spanC3.classList.add('orange');
                spanC3.innerText = 'Colis envoyé';
                break;
        }
    }
    loading2.classList.remove('active');
    nav.classList.remove('active'); // variable nav déclarée dans script-afficher-ref.js
    open.classList.remove('active'); // variable nav déclarée dans script-afficher-ref.js
}

// FonctionData3
let FonctionData3 = () => {
    let xhr = new XMLHttpRequest();

    loading2.classList.add('active');

    let data3 = new FormData();
    data3.append('reference', reference.value);
    
    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            FonctionReponse3(this.response);
        }
    });

    xhr.open('POST', '/Projets_FullStack/projet-4/medias/php/readCde.php');
    xhr.send(data3);
}

gerer.addEventListener('click', function(e) {
    e.preventDefault();
    FonctionData3();
});