<?php
$dns  = 'mysql:host=localhost;dbname=brickstuto;charset=utf8';
$user = 'root';
$pass = '';

try {
    $cnx = new PDO($dns, $user, $pass);
} catch(PDOException $e) {
    echo 'Une erreur est survenue !';
}
