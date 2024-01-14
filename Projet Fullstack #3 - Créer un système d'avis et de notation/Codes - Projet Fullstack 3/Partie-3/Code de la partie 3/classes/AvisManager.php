<?php
class AvisManager {
    private $cnx;

    public function __construct($cnx) {
        $this->setCnx($cnx);
    }

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

    private function setCnx($cnx) {
        $this->cnx = $cnx;
    }
}