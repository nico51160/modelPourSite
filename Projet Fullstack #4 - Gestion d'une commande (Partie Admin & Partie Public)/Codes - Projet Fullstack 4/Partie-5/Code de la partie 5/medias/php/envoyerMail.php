<?php
include('../../classes/EnvoyerMail.php');

$envoyer = new EnvoyerMail('PRENOM', 'NOM', 'EMAIL', 'REF');
$envoyer->EnvoiMail();