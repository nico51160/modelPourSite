<?php
include('cnx/cnx.php');
include('classes/Valider.php');
include('classes/ContactManager.php');

$valider = new Valider($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['msg'], $_POST['gtoken']);
$valider->getNom();
$valider->getPrenom();
$valider->getEmail();
$valider->getMsg();
$valider->getGtoken();
$valider->EnvoiMail();

$ContactManager = new ContactManager($cnx);
$ContactManager->CreateContact($valider);