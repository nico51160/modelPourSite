<?php
$dsn  = 'mysql:host=localhost;dbname=fullstack4;charset=utf8';
$user = 'root';
$pass = '';

try {
    $cnx = new PDO($dsn, $user, $pass);
} catch(PDOException $e) {
    echo 'Une erreur est survenue !';
}