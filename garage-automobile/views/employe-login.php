<?php
if (isset($_POST['submit'])) {
    $user = new UserController();
    $result = $user->login();
}
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-6 mx-auto login">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title text-center">Connexion</h3>
                </div>
                <?php echo isset($result) ?  $result : ''; ?>
                <div class="card-body bg-dark">
                    <form method="POST" class="mr-1">
                        <div class="form-group">
                            <label for="login" class="form-label">Login*</label>
                            <input type="text" class="form-control" name="login">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Mot de passe*</label>
                            <input type="password" placeholder="Veuillez inserer votre mot de passe à 8 chiffre" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="captcha">
                                <label class="form-check-label" for="captcha">Je ne suis pas un robot</label>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-light">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Attend que le contenu de la page soit entièrement chargé
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionne le formulaire dans le document
        const form = document.querySelector('form');

        // Sélectionne la case à cocher du captcha dans le document
        const captchaCheckbox = document.getElementById('captcha');

        // Ajoute un écouteur d'événements au formulaire pour intercepter sa soumission
        form.addEventListener('submit', function(event) {
            // Vérifie si la case à cocher du captcha n'est pas cochée
            if (!captchaCheckbox.checked) {
                // Empêche la soumission du formulaire
                event.preventDefault();
                // Affiche une alerte demandant à l'utilisateur de cocher la case du captcha
                alert("Veuillez cocher la case 'Je ne suis pas un robot' avant de soumettre le formulaire.");
            }
        });
    });
</script>

