let nav                 = document.querySelector('nav');
let HauteurAvantNav     = nav.offsetTop;
let header              = document.querySelector('header');
let section             = document.querySelector('section');
let HauteurAvantArticle = header.clientHeight + section.clientHeight;

let distanceNav = () => {
    if(window.scrollY >= HauteurAvantNav) {
        nav.classList.add('active');
        if(window.scrollY >= HauteurAvantArticle) {
            nav.classList.add('modif');
        } else {
            nav.classList.remove('modif');
        }
    } else {
        nav.classList.remove('active');
    }
}


window.addEventListener('scroll', distanceNav);