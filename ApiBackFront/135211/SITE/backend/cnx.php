<?php
$dsn  = 'mysql:host=__HOTE_SERVEUR__;dbname=__NOM_BDD__;charset=utf8';
$user = '__LOGIN_BDD__';
$pass = '__PASS_BDD__';

try {
	$cnx = new PDO($dsn, $user, $pass);
} catch(PDOException $e) {
	echo 'Une erreur est survenue !';
}