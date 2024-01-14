<?php
include('../../cnx/cnx.php');
spl_autoload_register( function($class) {
    include('../../classes/'.$class.'.php');
});

$manager = new BienManager($cnx);
$bien = $manager->ReadBien($_POST['ID']);


if(empty($bien->getBienID())) {
    $retour = array(
        'bienID'       => '',
        'bien'         => 'Ce Bien n\'est pas disponible',
        'image'        => '',
        'plateformeID' => '',
        'plateforme'   => '',
        'url'          => ''
    );
} else {
    $retour = array(
        'bienID'       => $bien->getBienID(),
        'bien'         => $bien->getBien(),
        'image'        => $bien->getImage(),
        'plateformeID' => $bien->getPlateformeID(),
        'plateforme'   => $bien->getPlateforme(),
        'url'          => $bien->getUrl()
    );
}

echo json_encode($retour);