<?php
class TemoignageController
{

    public function createTemoignage($id)
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom' => $_POST['nom'],
                'commentaire' => $_POST['commentaire'],
                'note' => $_POST['note'],
            );
            $result = Temoignage::create($data);
            if ($result === 'ok') {
                if($id){
                    header('location: gestion-services');
                }else{
                    header('location: visiteur-services');
                }
            } else {
                echo $result;
            }
        }
    }

    public function readAllTemoignages()
    {
        $temoignages = Temoignage::readAll();
        return $temoignages;
    }


    public function acceptTemoignage($id)
    {
        $result = Temoignage::accept($id);
        if ($result == 'ok') {
            header('location: gestion-services');
        }
    }

}
