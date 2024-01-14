<?php
class Upload {
    private $folder;
    const FILESIZE = 700000000; // EN octets

    public function __construct($dossier) {
        $this->setFolder($dossier);
    }

    private function setFolder($dossier) {
        if(is_string($dossier)) {
            $this->folder = $dossier;
        }
    }

    public function getFolder() {
        if(!file_exists($this->folder)) {
            mkdir($this->folder,0777,true);
        }
    }

    public function getFile() {
        if( isset($_FILES['fichier']) && !empty($_FILES['fichier']['name']) && $_FILES['fichier']['error'] == 0 ) {
            $extension   = strrchr($_FILES['fichier']['name'], '.');
            $autorise    = ['.jpg', '.JPG'];
            $destination = $this->folder . $_FILES['fichier']['name'];
            if(in_array($extension, $autorise)) {
                if($_FILES['fichier']['size'] > self::FILESIZE) {
                    $phraseErreur = 'Le fichier ne peut exéder ' . self::FILESIZE/1000 .' ko';
                    echo json_encode($phraseErreur);
                } else {
                    move_uploaded_file($_FILES['fichier']['tmp_name'], $destination);
                    $destination = 'include/' .$destination;
                    echo json_encode($destination);
                }
            } else {
                $phraseErreur = 'Fichier non autorisé !';
                echo json_encode($phraseErreur);
            }
        } else {
            $phraseErreur = 'Une erreur est survenue !';
            echo json_encode($phraseErreur);
        }
    }
}