let depart  = document.getElementById('depart');
let arriver = document.getElementById('arriver');

let start = (e) => {
    e.dataTransfer.setData('text', e.target.id);
}

let over = (e) => {
    e.preventDefault();
    e.target.classList.add('active');
}

let drop = (e) => {
    let id      = e.dataTransfer.getData('text');
    let element = document.getElementById(id);
    e.target.appendChild(element);
    e.target.classList.remove('active');
}

let leave = (e) => {
    e.target.classList.remove('active');
}

// dragstart: se déclenche quand un user glisse un élément
depart.addEventListener('dragstart', start);
arriver.addEventListener('dragstart', start);

// dragover: permet à la cible d'accepter un futur déposer
arriver.addEventListener('dragover', over);
depart.addEventListener('dragover', over);

// drop: se déclenche quand un élément est déposé dans la cible
arriver.addEventListener('drop', drop);
depart.addEventListener('drop', drop);

//dragleave: se déclenche quand un élément quitte la cible
arriver.addEventListener('dragleave', leave);
depart.addEventListener('dragleave', leave);