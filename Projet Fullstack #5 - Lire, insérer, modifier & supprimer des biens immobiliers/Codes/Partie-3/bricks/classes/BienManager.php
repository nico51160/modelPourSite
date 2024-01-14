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


    /******* LIRE UN BIEN */
    public function ReadBien($bienID) {
        $sql = 'SELECT * FROM bien AS b
                INNER JOIN plateforme AS p
                ON b.plateformeID = p.plateformeID
                WHERE b.bienID = :bienID';
        $req = $this->cnx->prepare($sql);
        $req->execute(
            array(
                ':bienID' => $bienID
            )
        );
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $bien = new Bien();
        $bien->setBienID($data['bienID']);
        $bien->setBien($data['bien']);
        $bien->setImage($data['image']);
        $bien->setPlateformeID($data['plateformeID']);
        $bien->setPlateforme($data['plateforme']);
        $bien->setUrl($data['url']);

        return $bien;
    }
    /******* LIRE UN BIEN */
    /********/


    /******* MODIFIER UN BIEN */
    public function UpdateBien(Bien $bien) {
        $sql = 'UPDATE bien SET
                bien = :bien, image = :image, plateformeID = :plateformeID
                WHERE bienID = :bienID';
        $req = $this->cnx->prepare($sql);
        $req->execute(
            array(
                ':bienID'       => $bien->getBienID(),
                ':bien'         => $bien->getBien(),
                ':image'        => $bien->getImage(),
                ':plateformeID' => $bien->getPlateformeID()
            )
        );        
    }
    /******* MODIFIER UN BIEN */
    /********/


    private function setCnx($cnx) {
        $this->cnx = $cnx;
    }
}