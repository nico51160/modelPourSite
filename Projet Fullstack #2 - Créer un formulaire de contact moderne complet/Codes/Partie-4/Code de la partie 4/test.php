<?php
include('classes/Valider.php');

$valider = new Valider($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['msg']);
$valider->getNom();
$valider->getPrenom();
$valider->getEmail();
$valider->getMsg();
$valider->EnvoiMail();