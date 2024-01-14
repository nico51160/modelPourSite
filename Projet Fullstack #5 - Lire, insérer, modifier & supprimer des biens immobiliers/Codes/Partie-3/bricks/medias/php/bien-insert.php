<?php
include('../../cnx/cnx.php');
include('../../includes/upload-extension.php');
spl_autoload_register( function($class) {
    include('../../classes/'.$class.'.php');
});


if( empty($_POST['bien']) && empty($_POST['fichier']) ) {
    $msg = '<div class="error">Une erreur est survenue !</div>';
} else {
    $bien = new Bien();
    $bien->setBien($_POST['bien']);
    $bien->setImage($_FILES['fichier']['name']);
    $bien->setPlateformeID($_POST['plateforme']);

    $manager = new BienManager($cnx);
    $verif = $manager->VerifBien($_POST['bien']);
    if($verif) {
        $msg = '<div class="error">Ce Bien est déjà présent</div>';
    } else {
        $image     = strrchr($_FILES['fichier']['name'], '.');
        // $extension déclaré dans includes/upload-extension.php
        if(in_array($image, $extension)) {
            if($_FILES['fichier']['size'] > 100000000) {
                $msg = '<div class="error">Fichier trop volumineux</div>';
            } else {
                $dossier = new Upload('../uploads/');
                $dossier->getFolder(); 
                $dossier->getFile();
        
                $manager->CreateBien($bien);   
                $msg = '<div class="success">Le nouveau Bien a été inséré</div>';
            }
        } else {
            $msg = '<div class="error">Extension non autorisée</div>';
        }
    }
}

$arr = array(
    'msg' => $msg
);
echo json_encode($arr);