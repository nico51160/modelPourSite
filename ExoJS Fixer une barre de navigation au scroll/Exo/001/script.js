const nav = document.querySelector('nav');
const H   = nav.offsetTop;

window.addEventListener('scroll', function() {
    if(window.scrollY >= H) {
        nav.classList.add('fixe');
    } else {
        nav.classList.remove('fixe');
    }
});