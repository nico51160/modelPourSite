// FonctionData4
let FonctionData4 = () => {
    let xhr = new XMLHttpRequest();
    
    let data = new FormData();
    data.append('reference', reference.value);
    data.append('num', num.value);
    
    xhr.open('POST', '/Projets_FullStack/projet-4/medias/php/insertNumColis.php');
    xhr.send(data);
}

// Variable num déclarée dans script-admin.js
num.addEventListener('blur', function() {
    FonctionData4();
});