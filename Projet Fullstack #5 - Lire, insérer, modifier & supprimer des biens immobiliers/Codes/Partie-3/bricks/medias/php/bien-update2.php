<?php
include('../../cnx/cnx.php');
include('../../includes/upload-extension.php');
spl_autoload_register( function($class) {
    include('../../classes/'.$class.'.php');
});



if( empty($_POST['bien']) && empty($_POST['fichier']) ) {
    $msg = '<div class="error">Une erreur est survenue !</div>';
} else {


    $manager = new BienManager($cnx);
    $bien2 = $manager->ReadBien($_POST['ID']);
    
    $bien = new Bien();
    $bien->setBienID($_POST['ID']);
    $bien->setBien($_POST['bien']);
    $bien->setPlateformeID($_POST['plateforme']);

    if(empty($_FILES['fichier']['name'])) {
        $bien->setImage($bien2->getImage());
        $manager->UpdateBien($bien);
        $msg = '<div class="success">Le Bien a été modifié</div>';
    } else {
        $bien->setImage($_FILES['fichier']['name']);

        $image     = strrchr($_FILES['fichier']['name'], '.');
        // $extension déclaré dans includes/upload-extension.php
        if(in_array($image, $extension)) {
            if($_FILES['fichier']['size'] > 100000000) {
                $msg = '<div class="error">Fichier trop volumineux</div>';
            } else {
                // supprimer l'ancien fichier du serveur
                $fichier = $_SERVER['DOCUMENT_ROOT'].'/TUTOS/bricks/medias/uploads/'.$bien2->getImage();
                if(file_exists($fichier)) {
                    unlink($fichier);
                }

                $dossier = new Upload('../uploads/');
                $dossier->getFolder(); 
                $dossier->getFile();

                $manager->UpdateBien($bien);
                $msg = '<div class="success">Le Bien a été modifié</div>';
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