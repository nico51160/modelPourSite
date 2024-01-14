<?php
include('../../cnx/cnx.php');
spl_autoload_register( function($class) {
    include('../../classes/'.$class.'.php');
});

$plateformeM = new PlateformeManager($cnx);
$plateformes = $plateformeM->ReadAllPlateforme();

foreach($plateformes as $plateforme) {
    $retour = array(
        'plateformeID' => $plateforme->getPlateformeID(),
        'plateforme'   => $plateforme->getPlateforme()
    );
    $retours[] = $retour;
}

echo json_encode($retours);