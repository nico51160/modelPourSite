<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tuto</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>

<div id="erreur"></div>
<div id="conteneur">
	<span id="loading"></span>
</div>

<?php
if(!isset($_GET['tutoID']) || empty($_GET['tutoID'])) {
	$id = 1;
} else {
	$id = $_GET['tutoID'];
}
?>
<script>var id = <?= $id; ?></script>
<script src="js/script-Read.js"></script>
</body>
</html>
