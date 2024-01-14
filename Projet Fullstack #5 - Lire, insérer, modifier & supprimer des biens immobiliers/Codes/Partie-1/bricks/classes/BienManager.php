<?php
class BienManager {
    private $cnx;

    public function __construct($cnx) {
        $this->setCnx($cnx);
    }

    /******* CREER UN NOUVEAU BIEN */
    public function CreateBien(Bien $bien) {
        $sql = 'INSERT INTO bien
                (bien, image, plateformeID) VALUES
                (:bien,:image,:plateformeID)';
        $req = $this->cnx->prepare($sql);
        $req->execute(
            array(
                ':bien'         => strtolower($bien->getBien()),
                ':image'        => $bien->getImage(),
                ':plateformeID' => $bien->getPlateformeID()
            )
        );
    }
    /******* CREER UN NOUVEAU BIEN */
    /********/

    /******* VERIFIER SI LE BIEN EST PRESENT DANS LA TABLE BIEN */
    public function VerifBien($bien) {
        $sql = 'SELECT bien FROM bien
                WHERE bien = :bien';
        $req = $this->cnx->prepare($sql);
        $req->execute(
            array(
                ':bien'  => strtolower($bien)               
            )
        );
        $count = $req->rowCount();
        if($count > 0) {
            return true;
        } else {
            return false;
        }
    }
    /******* VERIFIER SI LE BIEN EST PRESENT DANS LA TABLE BIEN */
    /********/

    private function setCnx($cnx) {
        $this->cnx = $cnx;
    }
}