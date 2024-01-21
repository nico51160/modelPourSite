<?php
/////////////// ZONE DE CONTROLE
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, x-Requested-With');
/////////////// ZONE DE CONTROLE

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
/////////////// REPONSE API OK


/////////////// TRAITEMENT DES INFOS RECUES
	$data = json_decode(file_get_contents("php://input"), true);
	if(!empty($data['tutoID']) && !empty($data['titre']) && !empty($data['description']) && !empty($data['url'])) {
	http_response_code(200);
	/////////////// APPEL METHODES		
		include('../cnx.php');
		spl_autoload_register(function($class) {
			include('../classes/'.$class.'.php');
		});
		
		$tuto = new Tuto();
		$tuto->setTutoID($data['tutoID']);
		$tuto->setTitre($data['titre']);
		$tuto->setDescription($data['description']);
		$tuto->setUrl($data['url']);
		
		$manager = new TutoManager($cnx);
		$manager->UpdateTuto($tuto);
		
		$message = array(
			'msg'   => 'Modification réussie !'
		);
		echo json_encode($message);
	/////////////// APPEL METHODES	
	
	} else {
		http_response_code(405);
		$message = array(
			'msgErreur'   => 'Une erreur est survenue !',
			'explication' => 'Les champs titre, description et url sont obligatoires'
		);
		echo json_encode($message);
	}
/////////////// TRAITEMENT DES INFOS RECUES
/////////////// REPONSE API OK


	
} else {
/////////////// REPONSE API KO	
	http_response_code(405);
	$message = array(
		'msgErreur'   => 'Méthode non autorisée',
		'explication' => 'Vous devez utiliser la méthode PUT'
	);
	echo json_encode($message);
/////////////// REPONSE API KO		
}	