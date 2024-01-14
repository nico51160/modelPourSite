<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="medias/css/librairies/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="medias/css/librairies/animate.min.css">
    <link rel="stylesheet" href="medias/css/style-loading.css">
    <link rel="stylesheet" href="medias/css/style.css">
    <title>Nous contacter</title>
</head>
<body>   
    <div id="box" class="animate__animated">
        <div id="box-info">
            <h2>A propos</h2>
            <p>Vous pouvez également nous contacter à l'adresse ou au numéro de téléphone ci-dessous <strong>du lundi au vendredi de 9h à 17h sans interruption.</strong></p>
            <ul>
                <li><i class="fas fa-map-marker-alt"></i> Société <br> 1, avenue de la rue <br> 12345 Ville</li>
                <li><i class="fas fa-phone-volume"></i> 01 23 45 67 89</li>
            </ul>
            <h3>Réseaux sociaux</h3>
            <ul class="sociaux">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
        <div id="box-form">
            <form action="" method="post">
                <h2>Nous contacter</h2>
                    <div class="input-content">
                        <label for="nom">Votre nom</label>
                        <input type="text" name="nom" id="nom">
                        <span id="controleNom"></span>
                    </div>
                    <p id="explicationNom"></p>

                    <div class="input-content">
                        <label for="prenom">Votre prénom</label>
                        <input type="text" name="prenom" id="prenom">
                        <span id="controlePrenom"></span>
                    </div>
                    <p id="explicationPrenom"></p>

                    <div class="input-content">
                        <label for="email">Votre email</label>
                        <input type="email" name="email" id="email">
                        <span id="controleEmail"></span>
                    </div>
                    <p id="explicationEmail"></p>

                    <div class="input-content textarea">
                        <label for="msg">Votre message</label>
                        <textarea name="msg" id="msg"></textarea>
                    </div>

                    <input type="hidden" name="gtoken" id="gtoken">
                
                    <button disabled>
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                    <p id="msgError"></p>
            </form>
        </div>
    </div>


    <div id="box-reponse" class="animate__animated">
        <div id="loading">
            <div class="load1"></div>
            <div class="load2"></div>
            <div class="load3"></div>
        </div>
        <h2 class="error"></h2>
        <div class="retourReponse"></div>
    </div>


    <script src="https://www.google.com/recaptcha/api.js?render=6LdGjo8aAAAAABJ-sj_xSAvEjRb5sDYbKv2QgftC"></script>
    <script>
    let tk = () => {
        grecaptcha.ready(function() {
            grecaptcha.execute('6LdGjo8aAAAAABJ-sj_xSAvEjRb5sDYbKv2QgftC', {action: 'submit'}).then(function(token) {
                document.getElementById('gtoken').value = token;
            });
        });
    }
    tk();
    setInterval( function() {
        tk()
    }, 119000);
  </script>
    <script src="medias/js/script-label.js"></script>
    <script src="medias/js/script-formulaire.js"></script>
</body>
</html>