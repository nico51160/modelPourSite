<?php
include('../../cnx/cnx.php');
spl_autoload_register( function($class) {
    include('../../classes/'.$class.'.php');
});

$manager = new BienManager($cnx);
$biens   = $manager->ReadAllBien();

if($biens == 'vide') {
    $retour = array(
        'bienID'     => 0,
        'bien'       => 'NC',
        'plateforme' => 'NC',
        'url'        => ''
    );
    $retours[] = $retour;
} else {
    foreach($biens as $bien) {
        $retour = array(
            'bienID'     => $bien->getBienID(),
            'bien'       => $bien->getBien(),
            'plateforme' => $bien->getPlateforme(),
            'url'        => $bien->getUrl()
        );
        $retours[] = $retour;
    }
}

echo json_encode($retours);