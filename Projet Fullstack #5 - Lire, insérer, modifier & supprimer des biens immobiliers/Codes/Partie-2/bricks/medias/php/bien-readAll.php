<?php
include('../../cnx/cnx.php');
spl_autoload_register( function($class) {
    include('../../classes/'.$class.'.php');
});

$manager = new BienManager($cnx);
$biens   = $manager->ReadAllBien();

foreach($biens as $bien) {
    $retour = array(
        'bienID'     => $bien->getBienID(),
        'bien'       => $bien->getBien(),
        'plateforme' => $bien->getPlateforme(),
        'url'        => $bien->getUrl()
    );
    $retours[] = $retour;
}

echo json_encode($retours);