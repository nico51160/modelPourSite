<?php
require('cnx/cnx.php');
include('classes/Avis.php');
include('classes/AvisManager.php');

if(isset($_POST['valider'])) {
    $avis = new Avis();
    $avis->setNote($_POST['note']);
    $avis->setCommentaire($_POST['commentaire']);
    $avis->setArticleID($_POST['articleID']);
    $avis->setclientID($_POST['clientID']);

    $manager = new AvisManager($cnx);
    $manager->CreateAvis($avis);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="medias/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="medias/css/style.css">
    <title>Avis et Notation. CarlBrison.fr</title>
</head>
<body>
    <div id="site">
        <header>
            <h1><span>Votre</span> avis</h1>
        </header>
        <article>
            <h3>Merci de laisser votre avis</h3>
            <p>Nous prenons grand soin de vos avis et commentaires</p>
            <section>
                <form action="" method="post">
                    <i class="fas fa-star" data-valeur="1"></i>
                    <i class="fas fa-star" data-valeur="2"></i>
                    <i class="fas fa-star" data-valeur="3"></i>
                    <i class="fas fa-star" data-valeur="4"></i>
                    <i class="fas fa-star" data-valeur="5"></i>
                    <p>Notez de 1 à 5.</p>
                    <input type="hidden" name="note" id="note">
                    <textarea name="commentaire" id="commentaire" placeholder="Votre commentaire"></textarea>
                    <input type="hidden" name="articleID" value="1">
                    <input type="hidden" name="clientID" value="9">
                    <input type="submit" value="Donner mon avis" name="valider" id="valider">
                </form>
                <p id="erreur"></p>
            </section>
        </article>
    </div>

    <script src="medias/js/note.js"></script>
</body>
</html>