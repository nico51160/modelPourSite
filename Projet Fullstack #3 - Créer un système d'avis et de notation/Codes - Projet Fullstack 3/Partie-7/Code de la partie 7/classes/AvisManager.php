<?php
class AvisManager {
    private $cnx;

    public function __construct($cnx) {
        $this->setCnx($cnx);
    }


/******************** INSERER UN AVIS */    
    public function CreateAvis(Avis $avis) {
        $sql = 'INSERT INTO avis
                (note, commentaire, articleID, clientID) VALUES
                (:note, :commentaire, :articleID, :clientID)';
        $req = $this->cnx->prepare($sql);
        $req->bindValue(':note', $avis->getNote(), PDO::PARAM_INT);
        $req->bindValue(':commentaire', $avis->getCommentaire(), PDO::PARAM_STR);
        $req->bindValue(':articleID', $avis->getArticleID(), PDO::PARAM_INT);
        $req->bindValue(':clientID', $avis->getClientID(), PDO::PARAM_INT);

        $req->execute();
    }
/******************** INSERER UN AVIS */  
/*********************/  


/******************** LIRE LA NOTE GLOBALE D'UN ARTICLE */ 
    public function ReadAvis($articleID) {
        $sql = 'SELECT AVG(note) AS moyenne
                FROM avis
                WHERE articleID = :articleID';
        $req = $this->cnx->prepare($sql);
        $req->bindValue(':articleID', $articleID, PDO::PARAM_INT);   
        
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);

        return round($data['moyenne'],1);
    }
/******************** LIRE LA NOTE GLOBALE D'UN ARTICLE */  
/*********************/  


    private function setCnx($cnx) {
        $this->cnx = $cnx;
    }
}