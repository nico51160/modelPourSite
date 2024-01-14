let ouvrir = document.querySelector('#open');
let fermer = document.querySelector('.close');

ouvrir.addEventListener('click', function() {
    document.querySelector('#pop').classList.add('active');
    document.querySelector('.popup div').classList.add('animate__zoomInUp');
    document.querySelector('.popup div').classList.remove('animate__backInUp');
});

fermer.addEventListener('click', function() {    
    document.querySelector('.popup div').classList.remove('animate__zoomInUp');
    document.querySelector('.popup div').classList.add('animate__backOutDown');
    setTimeout( function() {
        document.querySelector('#pop').classList.remove('active');
    }, 1000);
});