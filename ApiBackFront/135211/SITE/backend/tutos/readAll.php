<?php
/////////////// VERIFICATION CLE API
/*if(isset($_GET['cle'])) { // Verif de la présence du parametre cle - DEBUT
	include('../cnx.php');
	spl_autoload_register(function($class) {
		include('../classes/'.$class.'.php');
	});
	$clientManager = new ClientManager($cnx);
	$verification = $clientManager->ControleClient($_GET['cle']);
	
	if(!empty($verification->getClientID())) {*/ // Si cle API OK - DEBUT
/////////////// VERIFICATION CLE API





/////////////// ZONE DE CONTROLE
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, x-Requested-With');
/////////////// ZONE DE CONTROLE




if($_SERVER['REQUEST_METHOD'] == 'GET') {
/////////////// REPONSE API OK
	http_response_code(200);

	
/////////////// APPEL METHODES		
	include('../cnx.php');
	spl_autoload_register(function($class) {
		include('../classes/'.$class.'.php');
	});
	$manager = new TutoManager($cnx);
	$tutos = $manager->ReadAllTuto();
	$count = $manager->CompterTuto();
/////////////// APPEL METHODES	

	
/////////////// ENVOI DES DONNEES EN JSON
	if($count > 0) {
		foreach($tutos as $tuto) {
			$msg = array(
				'tutoID'       => $tuto->getTutoID(),
				'titre'       => $tuto->getTitre(),
				'description' => $tuto->getDescription(),
				'url'         => $tuto->getUrl()
			);
			$messages[] = $msg;
		}
		echo json_encode($messages);
	} else {
		$message = array(
			'msgErreur'   => 'Aucune donnée de disponible'
		);
		echo json_encode($message);
	}
/////////////// ENVOI DES DONNEES EN JSON	
/////////////// REPONSE API OK


	
} else {
/////////////// REPONSE API KO	
	http_response_code(405);
	$message = array(
		'msgErreur'   => 'Méthode non autorisée',
		'explication' => 'Vous devez utiliser la méthode GET'
	);
	echo json_encode($message);
/////////////// REPONSE API KO		
}
/*	} else { // Si cle API OK - SUITE
		http_response_code(404);
	} // Si cle API OK - FIN
} else { // Verif de la présence du parametre cle - SUITE
	http_response_code(404);
} */ // Verif de la présence du parametre cle - FIN











