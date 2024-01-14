<?php
class TransactionManager {
    private $cnx;

    public function __construct($cnx) {
        $this->setCnx($cnx);
    }


    /******* VERIFIER SI UN BIEN POSSEDE DES REVENUS */
    public function VerifRevenuBien($bienID) {
        $sql = 'SELECT * FROM transaction
                WHERE bienID = :bienID';
        $req = $this->cnx->prepare($sql);
        $req->execute(
            array(
                ':bienID' => $bienID
            )
        );
        if($req->rowCount() <= 0) {
            $transactions = 'vide';
        } else {

            while($datas = $req->fetch(PDO::FETCH_ASSOC)) {
                $transaction = new Transaction();
                $transaction->setTransactionID($datas['transactionID']);
                $transaction->setQuantite($datas['quantite']);
                $transaction->setMontant($datas['montant']);
                $transaction->setPu($datas['pu']);
                $transaction->setDateTransaction($datas['dateTransaction']);
                $transaction->setTypeID($datas['typeID']);
                $transaction->setBienID($datas['bienID']);
                $transactions[] = $transaction;
                if($datas['typeID'] > 1) {
                    $transactions = 'non';
                    break;
                }
            }
            
        }
        return $transactions;
    }
    /******* VERIFIER SI UN BIEN POSSEDE DES REVENUS */
    /********/


    /******* SUPPRIMER TOUTES LES TRANSACTIONS D'UN BIEN */
    public function DeleteTransactionBien($bienID) {
        $sql = 'DELETE FROM transaction
                WHERE bienID = :bienID';
        $req = $this->cnx->prepare($sql);
        $req->execute(
            array(
                ':bienID' => $bienID
            )
        );
    }
    /******* SUPPRIMER TOUTES LES TRANSACTIONS D'UN BIEN */
    /********/


    
    private function setCnx($cnx) {
        $this->cnx = $cnx;
    }
}