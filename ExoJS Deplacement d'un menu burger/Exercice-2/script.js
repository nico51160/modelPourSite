let burger     = document.getElementById('burger');
let navigation = document.getElementById('navigation');

burger.addEventListener('click', function() {
    this.classList.toggle('active');
    navigation.classList.toggle('active');
});