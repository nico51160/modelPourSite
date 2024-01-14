let ref = document.getElementById('ref');

// FonctionReponse2
let FonctionReponse2 = (reponse) => {
    let json = JSON.parse(reponse);
    for(let i = 0; i < json.length; i+=1) {
        ref.innerText += json[i].ref;
    }
}

// FonctionData2
let FonctionData2 = () => {
    let xhr = new XMLHttpRequest();

    xhr.addEventListener('readystatechange', function() {
        if(this.readyState == 4 && this.status == 200) {
            FonctionReponse2(this.response);
            console.log(this.response);
        }
    });

    xhr.open('GET', '/Projets_FullStack/projet-4/medias/php/readAllRef.php');
    xhr.send();
}

window.addEventListener('load', function() {
    FonctionData2();
});