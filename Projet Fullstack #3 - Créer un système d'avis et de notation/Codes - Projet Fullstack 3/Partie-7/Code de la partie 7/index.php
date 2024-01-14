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
    <title>Avis et Notation. CarlBrison.fr</title>
</head>
<body>
    <div id="site">
        <header>
            <h1><span>Votre</span> avis</h1>
        </header>
        <article class="animate__animated">
            <h3>Merci de laisser votre avis</h3>
            <p>Nous prenons grand soin de vos avis et commentaires</p>
            <section>
                <div id="afficherNote"></div>
                <form action="" method="post">
                    <i class="fas fa-star" data-valeur="1"></i>
                    <i class="fas fa-star" data-valeur="2"></i>
                    <i class="fas fa-star" data-valeur="3"></i>
                    <i class="fas fa-star" data-valeur="4"></i>
                    <i class="fas fa-star" data-valeur="5"></i>
                    <p>Notez de 1 à 5.</p>
                    <input type="hidden" name="note" id="note">
                    <textarea name="commentaire" id="commentaire" placeholder="Votre commentaire"></textarea>
                    <input type="hidden" name="articleID" value="<?= $_GET['articleID']; ?>" id="articleID">
                    <input type="hidden" name="clientID" value="<?= $_GET['clientID']; ?>" id="clientID">
                    <input type="submit" value="Donner mon avis" name="valider" id="valider">
                </form>
                <p id="erreur"></p>
            </section>        
        </article>
        <article id="article2">
            <p id="reponse"></p>
            <p id="noteMoyenne">Note moyenne : <span></span>/5</p>
        </article>
    </div>

    <div id="sectionLoad">
        <div id="loading">
            <div class="load1"></div>
            <div class="load2"></div>
            <div class="load3"></div>
        </div>
    </div>

    <script src="medias/js/note.js"></script>
</body>
</html>