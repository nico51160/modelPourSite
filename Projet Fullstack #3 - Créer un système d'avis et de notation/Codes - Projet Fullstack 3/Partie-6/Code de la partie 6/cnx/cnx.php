<?php
$dsn  = 'mysql:host=__HOTE_SERVEUR__;dbname=__BDD__;charset=utf8';
$user = '__LOGIN__';
$pass = '__PASS__';

try {
    $cnx = new PDO($dsn, $user, $pass);
} catch(PDOException $e) {
    echo 'Une erreur est survenue !';
}