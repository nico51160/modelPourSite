let inputs        = document.querySelectorAll('input');
let labels        = document.querySelectorAll('label');
let textarea      = document.querySelector('textarea');
let textareaLabel = document.querySelector('.textarea label');

for(let i = 0; i<inputs.length; i+=1) {
    inputs[i].addEventListener('focus', function() {
        labels[i].classList.add('active');
    });
    inputs[i].addEventListener('blur', function() {
        if(this.value == '') {
            labels[i].classList.remove('active');
        }
    });
}

textarea.addEventListener('focus', function() {
    textareaLabel.classList.add('active');
});
textarea.addEventListener('blur', function() {
    if(this.value == '') {
        textareaLabel.classList.remove('active');
    }
});