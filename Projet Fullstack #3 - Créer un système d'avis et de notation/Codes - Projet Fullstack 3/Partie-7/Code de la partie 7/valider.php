<?php
require('cnx/cnx.php');
include('classes/Avis.php');
include('classes/AvisManager.php');

if( empty($_POST['note']) || empty($_POST['commentaire']) || empty($_POST['articleID']) || empty($_POST['clientID']) || strlen($_POST['commentaire'])>250 || $_POST['note']<=0 || $_POST['note']>5 ) {
    $phrase = 'Une erreur est survenue !';
} else {
    $avis = new Avis();
    $avis->setNote($_POST['note']);
    $avis->setCommentaire($_POST['commentaire']);
    $avis->setArticleID($_POST['articleID']);
    $avis->setclientID($_POST['clientID']);

    $manager = new AvisManager($cnx);
    $manager->CreateAvis($avis);
    $phrase = 'Merci de nous avoir donné votre avis';
}

$m = new AvisManager($cnx);
$arr = array(
        'phrase' => $phrase,
        'noteavg'=> $m->ReadAvis($_POST['articleID'])
        );
echo json_encode($arr);