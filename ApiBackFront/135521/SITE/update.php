<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Modifier un tuto</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>

<div id="erreur"></div>
<div id="conteneur">
	<div class="items modif">
    	<h2>Modifier un tuto</h2>
        <p><a href="index.html">Retour</a></p>
        <p id="reponse"><span id="loading"></span></p>
        <div id="formulaire"></div>
    </div>
</div>
<?php
if(!isset($_POST['valider'])) {
?>
<script>
var id = <?= $_GET['tutoID']; ?>
</script>
<script src="js/script-Read-Update.js"></script>

<?php
} else {
?>
<script>
var lid           = <?= $_GET['tutoID']; ?>;
var letitre       = "<?= $_POST['titre']; ?>";
var ladescription = "<?= $_POST['description']; ?>";
var lurl          = "<?= $_POST['url']; ?>";
</script>
<script src="js/script-Update.js"></script>
<?php
}
?>
</body>
</html>
