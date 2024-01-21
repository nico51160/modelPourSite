<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insérer un tuto</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>

<div id="erreur"></div>
<div id="conteneur">
	<div class="items modif">
    	<h2>Insérer un nouveau tuto</h2>
        <p><a href="index.html">Retour</a></p>
        <p id="reponse"><span id="loading"></span></p>
        <form method="post" action="">
        	<input type="text" name="titre" placeholder="Titre" />
            <textarea name="description" placeholder="Description"></textarea>
            <input type="text" name="url" placeholder="URL" />
            <input type="submit" name="valider" value="Insérer" />
        </form>
    </div>
</div>

<?php
if(isset($_POST['valider'])) {
$description = preg_replace("#\n|\r|\t#", "<br />", $_POST['description']);
$description = str_replace('"', '\"', $description);
?>
<script>
var letitre       = "<?= $_POST['titre']; ?>";
var ladescription = "<?= $description; ?>";
var lurl          = "<?= $_POST['url']; ?>";
</script>
<script src="js/script-Create.js"></script>
<?php
}
?>
</body>
</html>
