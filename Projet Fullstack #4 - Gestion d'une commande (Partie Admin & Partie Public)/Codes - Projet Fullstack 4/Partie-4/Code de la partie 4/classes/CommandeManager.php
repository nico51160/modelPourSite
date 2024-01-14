<?php
class CommandeManager {
    private $cnx;

    /***************** CONSTRUCTEUR */
    public function __construct($cnx) {
        $this->setCnx($cnx);
    }
    /***************** CONSTRUCTEUR */
    /******************/


    /***************** LIRE TOUTES LES REFERENCES A L'ETAT 0 */
    public function ReadAllRef() {
        $sql = 'SELECT ref FROM commande WHERE etat = 0';
        $req = $this->cnx->prepare($sql);
        $req->execute();

        while($datas = $req->fetch(PDO::FETCH_ASSOC)) {
            $cde = new Commande();
            $cde->setRef($datas['ref']);
            $cdes[] = $cde;
        }
        return $cdes;
    }
    /***************** LIRE TOUTES LES REFERENCES A L'ETAT 0 */
    /******************/


    /***************** CONNEXION A LA BDD */
    private function setCnx($cnx) {
        $this->cnx = $cnx;
    }
    /***************** CONNEXION A LA BDD */
    /******************/
}