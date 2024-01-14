<?php
include('../../cnx/cnx.php');
spl_autoload_register(function($class){
    include('../../classes/'.$class.'.php');
});

$cdeM = new CommandeManager($cnx);
$cde  = $cdeM->ReadCde($_POST['reference']);
$num  = $cdeM->ReadNumColis($_POST['reference']);

if(empty($cde->getRef())) {
    $retour = array(
        'ref' => 'INCONNUE',
        'date'=> '../../.....',
        'prenom' => '.....',
        'nom' => ''
    );
} else {
    $retour = array(
        'ref' => $cde->getRef(),
        'date'=> date('d/m/Y', strtotime($cde->getDate())),
        'etat' => $cde->getEtat(),
        'prenom' => $cde->getPrenom(),
        'nom' => $cde->getNom(),
        'numero' => $num->getNumero()
    );
}

echo json_encode($retour);