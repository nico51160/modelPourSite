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
                ':bien'         => $bien->getBien(),
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
                ':bien'  => $bien               
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


    /******* LIRE TOUS LES BIENS */
    public function ReadAllBien() {
        $sql = 'SELECT * FROM bien AS b
                INNER JOIN plateforme AS p
                ON b.plateformeID = p.plateformeID
                ORDER BY b.bien';
        $req = $this->cnx->prepare($sql);
        $req->execute();
        while($datas = $req->fetch(PDO::FETCH_ASSOC)) {
            $bien = new Bien();
            $bien->setBienID($datas['bienID']);
            $bien->setBien($datas['bien']);
            $bien->setPlateforme($datas['plateforme']);
            $bien->setUrl($datas['url']);
            $biens[] = $bien;
        }
        return $biens;
    }
    /******* LIRE TOUS LES BIENS */
    /********/

    private function setCnx($cnx) {
        $this->cnx = $cnx;
    }
}