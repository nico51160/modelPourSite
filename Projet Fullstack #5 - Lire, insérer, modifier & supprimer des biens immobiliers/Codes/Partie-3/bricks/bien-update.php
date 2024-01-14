<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
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
        <form action="" method="post" id="formulaire-bienUpdate" enctype="multipart/form-data">
            <div>
                <label for="bien">bien</label>
                <input type="text" name="bien" id="bien" placeholder="Nom du Bien">
            </div>
            <div>
                <select name="plateforme" id="plateforme"></select>
            </div>
            <h4>Modifier l'image</h4>
            <div id="upload">
                <input type="file" name="fichier" id="fichier">
                <label for="fichier">
                    <div>
                        <i class="fa-solid fa-download"></i>
                    </div>
                </label>
                <p></p>
            </div>
            <div id="submit">
                <input type="submit" value="Modifier">
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
<script src="medias/js/bien-update.js"></script>
</body>
</html>