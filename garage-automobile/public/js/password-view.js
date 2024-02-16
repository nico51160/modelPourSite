// Ajoute un écouteur d'événements à la case à cocher associée à l'ancien mot de passe
document.getElementById('showOldPassword').addEventListener('change', function() {
    // Récupère l'élément du champ de mot de passe de l'ancien mot de passe
    var passwordField = document.getElementById('oldPassword');
    // Change le type du champ de mot de passe en fonction de l'état de la case à cocher
    passwordField.type = this.checked ? 'text' : 'password';
});

// Ajoute un écouteur d'événements à la case à cocher associée au nouveau mot de passe
document.getElementById('showNewPassword').addEventListener('change', function() {
    // Récupère l'élément du champ de mot de passe du nouveau mot de passe
    var passwordField = document.getElementById('newPassword');
    // Change le type du champ de mot de passe en fonction de l'état de la case à cocher
    passwordField.type = this.checked ? 'text' : 'password';
});

// Ajoute un écouteur d'événements à la case à cocher associée à la confirmation du mot de passe
document.getElementById('showConfirmPassword').addEventListener('change', function() {
    // Récupère l'élément du champ de mot de passe de la confirmation du mot de passe
    var passwordField = document.getElementById('confirmPassword');
    // Change le type du champ de mot de passe en fonction de l'état de la case à cocher
    passwordField.type = this.checked ? 'text' : 'password';
});
