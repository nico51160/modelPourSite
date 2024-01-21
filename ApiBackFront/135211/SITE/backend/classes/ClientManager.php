<?php
class ClientManager {
	private $cnx;
	
	public function __construct($cnx) {
		$this->setCnx($cnx);
	}


	/********************* CONTROLER UNE CLE *************************/
	public function ControleClient($cle) {
		$sql = 'SELECT * FROM client
				WHERE cle = :cle';
		$req = $this->cnx->prepare($sql);	
		$req->bindValue(':cle', $cle, PDO::PARAM_STR);	
		$req->execute();
		
		$data = $req->fetch(PDO::FETCH_ASSOC);
		$client = new Client();
		$client->setClientID($data['clientID']);
		$client->setPseudo($data['pseudo']);
		$client->setCle($data['cle']);
		
		return $client;
	}
	/********************* CONTROLER UNE CLE *************************/
	/*****************/	
	
	
	/********************* PDO *************************/
	private function setCnx($cnx) {
		$this->cnx = $cnx;
	}
	/********************* PDO *************************/
	/*****************/
}	