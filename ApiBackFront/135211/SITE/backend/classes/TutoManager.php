<?php
class TutoManager {
	private $cnx;
	
	public function __construct($cnx) {
		$this->setCnx($cnx);
	}
	
	/********************* INSERER UN TUTO *************************/
	public function CreateTuto(Tuto $tuto) {
		$sql = 'INSERT INTO tuto
				(titre, description, url) VALUES
				(:titre, :description, :url)';
		$req = $this->cnx->prepare($sql);
		$req->bindValue(':titre', $tuto->getTitre(), PDO::PARAM_STR);	
		$req->bindValue(':description', $tuto->getDescription(), PDO::PARAM_STR);	
		$req->bindValue(':url', $tuto->getUrl(), PDO::PARAM_STR);
		$req->execute();	
	}
	/********************* INSERER UN TUTO *************************/
	/*****************/
	
	
	
	/********************* AFFICHER UN TUTO *************************/
	public function ReadTuto($id) {
		$sql = 'SELECT * FROM tuto
				WHERE tutoID = :id';
		$req = $this->cnx->prepare($sql);	
		$req->bindValue(':id', $id, PDO::PARAM_INT);	
		$req->execute();
		
		$data = $req->fetch(PDO::FETCH_ASSOC);
		$tuto = new Tuto();
		$tuto->setTutoID($data['tutoID']);
		$tuto->setTitre($data['titre']);
		$tuto->setDescription($data['description']);
		$tuto->setUrl($data['url']);
		
		return $tuto;
	}
	/********************* AFFICHER UN TUTO *************************/
	/*****************/
	
	
	
	/********************* AFFICHER TOUS LES TUTOS *************************/
	public function ReadAllTuto() {
		$sql = 'SELECT * FROM tuto';
		$req = $this->cnx->prepare($sql);
		$req->execute();
		
		while($data = $req->fetch(PDO::FETCH_ASSOC)) {
			$tuto = new Tuto();
			$tuto->setTutoID($data['tutoID']);
			$tuto->setTitre($data['titre']);
			$tuto->setDescription($data['description']);
			$tuto->setUrl($data['url']);
			$tutos[] = $tuto;
		}
		return $tutos;
	}
	/********************* AFFICHER TOUS LES TUTOS *************************/
	/*****************/
		
	
	
	/********************* COMPTER LES TUTOS *************************/
		public function CompterTuto() {
			$sql = 'SELECT COUNT(*) AS compter FROM tuto';
			$req = $this->cnx->prepare($sql);
			$req->execute();
			$data = $req->fetch(PDO::FETCH_ASSOC);
			return $data['compter'];
		}
	/********************* COMPTER LES TUTOS *************************/
	/*****************/		
	
	
	/********************* MODIFIER UN TUTO *************************/
		public function UpdateTuto(Tuto $tuto) {
			$sql = 'UPDATE tuto SET
					titre = :titre, description = :description, url = :url
					WHERE tutoID = :tutoID';
			$req = $this->cnx->prepare($sql);
			$req->bindValue(':tutoID', $tuto->getTutoID(), PDO::PARAM_INT);
			$req->bindValue(':titre', $tuto->getTitre(), PDO::PARAM_STR);	
			$req->bindValue(':description', $tuto->getDescription(), PDO::PARAM_STR);	
			$req->bindValue(':url', $tuto->getUrl(), PDO::PARAM_STR);
			$req->execute();	
		}
	/********************* MODIFIER UN TUTO *************************/
	/*****************/
	
	
	
	/********************* SUPPRIMER UN TUTO *************************/
		public function DeleteTuto($id) {
			$sql = 'DELETE FROM tuto
					WHERE tutoID = :id';
			$req = $this->cnx->prepare($sql);	
			$req->bindValue(':id', $id, PDO::PARAM_INT);	
			$req->execute();
		}
	/********************* SUPPRIMER UN TUTO *************************/
	/*****************/
	
	
	
	/********************* PDO *************************/
	private function setCnx($cnx) {
		$this->cnx = $cnx;
	}
	/********************* PDO *************************/
	/*****************/
}