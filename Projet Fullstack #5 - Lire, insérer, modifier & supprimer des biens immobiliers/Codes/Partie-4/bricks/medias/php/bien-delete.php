<?php
include('../../cnx/cnx.php');
spl_autoload_register( function($class) {
    include('../../classes/'.$class.'.php');
});

$bien = new Bien();
$bien->setBienID($_POST['ID']);

$manager = new BienManager($cnx);
$bien2 = $manager->ReadBien($_POST['ID']);

$transactionManager = new TransactionManager($cnx);
$transaction = $transactionManager->VerifRevenuBien($bien2->getBienID());


if(empty($bien2->getBienID())) {
    $msg = '<div class="error">Suppression impossible</div>';
} else {

    if($transaction == 'non') {
        $msg = '<div class="error">Ce Bien ne peut être supprimé car il contient des revenus</div>';
    } else {
        // supprimer l'ancien fichier du serveur
        $fichier = $_SERVER['DOCUMENT_ROOT'].'/TUTOS/bricks/medias/uploads/'.$bien2->getImage();
        if(file_exists($fichier)) {
            unlink($fichier);
        }
        $manager->DeleteBien($bien);
        if($transaction !== 'vide') {
            $transactionManager->DeleteTransactionBien($bien2->getBienID());    
        }
        $msg = '<div class="success">Le Bien a été supprimé</div>';
    }

}
  




$arr = array(
    'msg' => $msg
);
echo json_encode($arr);