<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer</title>
    <link rel="stylesheet" href="medias/css/loader.css">
    <link rel="stylesheet" href="medias/css/style.css">
</head>
<body>
 
<!-- HEADER -->
    <header>
        <h1></h1>
        <button>retour</button>
    </header>
<!-- HEADER --> 


<!-- ARTICLE -->
<article>
    <div class="imgBricks"></div>
    <div id="box-update">
        <h3></h3>
        <p id="reponse"></p>
        <form action="" method="post" id="formulaire-bienDelete">
            <h2>Confirmer la suppression du Bien</h2>
            <div id="submit">
                <input type="submit" value="Je confirme">
            </div>
        </form>
    </div>
</article>
<!-- ARTICLE -->


<!-- LOADER -->
    <section id="sectionLoad">
        <div id="loader">
            <div class="load1"></div>
            <div class="load2"></div>
            <div class="load3"></div>
        </div>
    </section>
<!-- LOADER -->

    <script src="https://kit.fontawesome.com/50786edb2e.js" crossorigin="anonymous"></script>
    <script src="medias/js/bien-readAll.js"></script>
    <script src="medias/js/bien-delete.js"></script>
</body>
</html>