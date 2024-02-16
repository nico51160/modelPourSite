<?php
class HoraireController
{
    public function updateHoraire()
    {
        $horaire = array(
            'id' => $_POST['id'],
            'matinee' => $_POST['matinee'],
            'apresmidi' => $_POST['apresmidi'],
        );
        $result = Horaire::update($horaire);
        if ($result == 'ok') {
            header('location: gestion-services');
        }
    }

    public function readHoraire($id)
    {
        $horaire = Horaire::read($id);
        return $horaire;
    }

    public function readAllHoraires()
    {
        $Horaires = Horaire::readAll();
        return $Horaires;
    }
}
