<?php
class VoitureController
{

    public function createVoiture()
    {
        $voiture = array(
            'nom' => $_POST['nom'],
            'caracteristiques' => $_POST['caracteristiques'],
            'moteur' => $_POST['moteur'],
            'annee' => $_POST['annee'],
            'kilometrage' => $_POST['kilometrage'],
            'prix' => $_POST['prix']
        );
        $result = Voiture::create($voiture);
        if ($result === 'ok') {
            header('location: gestion-voitures');
        } else {
            echo $result;
        }
    }


    public function updateVoiture($id)
    {
        $voiture = array(
            'id' => $id,
            'nom' => $_POST['nom'],
            'caracteristiques' => $_POST['caracteristiques'],
            'moteur' => $_POST['moteur'],
            'annee' => $_POST['annee'],
            'kilometrage' => $_POST['kilometrage'],
            'prix' => $_POST['prix']
        );
        $result = Voiture::update($voiture);
        if ($result == 'ok') {
            header('location: gestion-voitures');
        }
    }


    public function readVoiture($id)
    {
        $Voiture = Voiture::read($id);
        return $Voiture;
    }


    public function readVoituresByFilters()
    {
        $filters = array();
        if (isset($_POST['submit'])) {
            $filters = array(
                'filtreKilometrageMin' => $_POST['filtreKilometrageMin'],
                'filtreKilometrageMax' => $_POST['filtreKilometrageMax'],
                'filtreAnneeMin' => $_POST['filtreAnneeMin'],
                'filtreAnneeMax' => $_POST['filtreAnneeMax'],
                'filtrePrixMin' => $_POST['filtrePrixMin'],
                'filtrePrixMax' => $_POST['filtrePrixMax']
            );
        }
        $voitures = Voiture::readByFilters($filters);
        return $voitures;
    }


    public function deleteVoiture($id)
    {
        if (isset($id)) {
            $result = Voiture::delete($id);
            if ($result === 'ok') {
                header('location: gestion-voitures');
            }
        }
    }
}
