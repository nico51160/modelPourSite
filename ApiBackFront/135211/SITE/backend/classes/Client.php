<?php
class Client {
	private $clientID;
	private $pseudo;
	private $cle;
	
	public function getClientID() {
		return $this->clientID;
	}
	public function getPseudo() {
		return $this->pseudo;
	}
	public function getCle() {
		return $this->cle;
	}
	
	public function setClientID($clientID) {
		$clientID = intval($clientID);
		if(is_int($clientID)) {
			$this->clientID = $clientID;
		}
	}
	public function setPseudo($pseudo) {
		if(is_string($pseudo)) {
			$this->pseudo = $pseudo;
		}
	}
	public function setCle($cle) {
		if(is_string($cle)) {
			$this->cle = $cle;
		}
	}
}