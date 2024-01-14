<?php
class ContactManager {
    private $cnx;

    public function __construct($cnx) {
        $this->setCnx($cnx);
    }

    public function CreateContact(Valider $valider) {
        if( ($valider->getNomOk() == 1) && ($valider->getPrenomOk() == 1) && ($valider->getEmailOk() == 1) && ($valider->getMsgOk() == 1) && ($valider->getGtokenOk() == 1) ) {
            $sql = 'INSERT INTO contact
                    (nom, prenom, email, msg, dateheure) VALUES
                    (:nom, :prenom, :email, :msg, now())';
            $req = $this->cnx->prepare($sql);
            $req->bindValue(':nom', $valider->getNom(), PDO::PARAM_STR);       
            $req->bindValue(':prenom', $valider->getPrenom(), PDO::PARAM_STR);      
            $req->bindValue(':email', $valider->getEmail(), PDO::PARAM_STR);       
            $req->bindValue(':msg', $valider->getMsg(), PDO::PARAM_STR); 
            
            $req->execute();
        }
    }

    private function setCnx($cnx) {
        $this->cnx = $cnx;
    }
}