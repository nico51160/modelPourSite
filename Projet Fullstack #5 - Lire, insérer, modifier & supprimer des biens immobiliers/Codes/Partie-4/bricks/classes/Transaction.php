<?php
class Transaction {
    private $transactionID;
    private $quantite;
    private $montant;
    private $pu;
    private $dateTransaction;
    private $typeID;
    private $bienID;


    public function getTransactionID() {
        return $this->transactionID;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function getPu() {
        return $this->pu;
    }

    public function getDateTransaction() {
        return $this->dateTransaction;
    }

    public function getTypeID() {
        return $this->typeID;
    }

    public function getBienID() {
        return $this->bienID;
    }


    public function setTransactionID($transactionID) {
        $this->transactionID = $transactionID;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function setMontant($montant) {
        $this->montant = $montant;
    }

    public function setPu($pu) {
        $this->pu = $pu;
    }

    public function setDateTransaction($dateTransaction) {
        $this->dateTransaction = $dateTransaction;
    }

    public function setTypeID($typeID) {
        $this->typeID = $typeID;
    }

    public function setBienID($bienID) {
        $this->bienID = $bienID;
    }
}