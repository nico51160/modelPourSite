<?php
class Avis {
    private $avisID;
    private $note;
    private $commentaire;
    private $articleID;
    private $clientID;

    public function getAvisID() {
        return $this->avisID;
    }
    public function getNote() {
        return $this->note;
    }
    public function getCommentaire() {
        return $this->commentaire;
    }
    public function getArticleID() {
        return $this->articleID;
    }
    public function getClientID() {
        return $this->clientID;
    }

    public function setAvisID($avisID) {
        if($avisID > 0) {
            $this->avisID = $avisID;
        }
    }
    public function setNote($note) {
        if($note > 0) {
            $this->note = $note;
        }
    }
    public function setCommentaire($commentaire) {
        if(is_string($commentaire)) {
            $this->commentaire = $commentaire;
        }
    }
    public function setArticleID($articleID) {
        if($articleID > 0) {
            $this->articleID = $articleID;
        }
    }
    public function setClientID($clientID) {
        if($clientID > 0) {
            $this->clientID = $clientID;
        }
    }
}