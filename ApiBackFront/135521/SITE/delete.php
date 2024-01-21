<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supprimer un tuto</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>

<div id="erreur"></div>
<div id="conteneur">
	<div class="items modif">
    	<h2>Supprimer un tuto</h2>
        <p><a href="index.html">Retour</a></p>
        <p id="reponse"><span id="loading"></span></p>
        <div id="retourDelete">
            <p>Etes-vous certain de vouloir supprimer ce tuto ?</p>
            <form method="post" action="">
                <input type="submit" name="oui" value="Oui" />
            </form>
            <p><a href="index.html">Je ne souhaite pas supprimer ce tuto</a></p>
        </div>
    </div>
</div>
<?php
if(isset($_POST['oui'])) {
?>	
<script>
var id = <?= $_GET['tutoID']; ?>
</script>
<script src="js/script-Delete.js"></script>
<?php
}
?>
</body>
</html>
