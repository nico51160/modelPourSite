const nav = document.querySelector('nav');
const H   = nav.offsetTop;

window.addEventListener('scroll', function() {
    if( window.scrollY >= H && window.innerWidth <= 750) {
        nav.classList.add('fixe');
    } else {
        nav.classList.remove('fixe');
    }
});