<?php
class PlateformeManager {
    private $cnx;

    public function __construct($cnx) {
        $this->setCnx($cnx);
    }

    /******* LIRE TOUTES LES PLATEFORMES */
    public function ReadAllPlateforme() {
        $sql = 'SELECT plateformeID, plateforme FROM plateforme
                ORDER BY plateforme';
        $req = $this->cnx->prepare($sql);
        $req->execute();

        while($datas = $req->fetch(PDO::FETCH_ASSOC)) {
            $plateforme = new Plateforme();
            $plateforme->setPlateformeID($datas['plateformeID']);
            $plateforme->setPlateforme($datas['plateforme']);
            $plateformes[] = $plateforme;
        }
        return $plateformes;
    }
    /******* LIRE TOUTES LES PLATEFORMES */
    /********/

    private function setCnx($cnx) {
        $this->cnx = $cnx;
    }
}