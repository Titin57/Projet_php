<?php

// Inclusion de config.php
require dirname(__FILE__).'/../inc/config.php';

// Formulaire soumis
if (!empty($_POST)) {
	//Debug
	print_r($_POST);

	// Je récupère les données
	$emailToto = isset($_POST['emailToto']) ? trim($_POST['emailToto']) : '';
	$passwordToto1 = isset($_POST['passwordToto1']) ? trim($_POST['passwordToto1']) : '';
	$passwordToto2 = isset($_POST['passwordToto2']) ? trim($_POST['passwordToto2']) : '';
	// tableau d'erreurs
	$errorList = array();

	//Je valide les données
	if (empty($emailToto)) {
		$errorList[] = 'Email vide';
	}else if (filter_var($emailToto, FILTER_VALIDATE_EMAIL) === false) {
		$errorList[] = 'Email non valide ';
	}
	// TODO valider les données 
		
	


	// Si les password sont différents
	if ($passwordToto1 != $passwordToto2) {
		$errorList[] = 'Les 2 mdp sont differents';
	}

	// Aucune erreur
	if (empty($errorList)) {
		// On insert en DB
		$sql ='
			INSERT INTO user (usr_email, usr_password, usr_date_creation)
			VALUES (:email, :password, NOW())
		';
		$sth = $pdo->prepare($sql);
		//BindValues
		$sth->bindValue(':email', $emailToto);
		//$sth->bindValue(':password', $passwordToto1)); // en clair en DB, pas sécurisé du tout
		//$sth->bindValue(':password', md5($passwordToto1)); // encodé md5, bien mais peut être décrypté
		//$sth->bindValue(':password', md5('*'.$passwordToto1.'!$¨ben')); // ajout d'un "salt" qui rend + difficile le décryptage du md5
		$sth->bindValue(':password', password_hash($passwordToto1, PASSWORD_BCRYPT)); // password_hash => tjr 60 caractères 
		
		// J'execute
		if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		}
		else{
			echo 'signup ok<br>';
		}

	}
}



// A la fin (TOUJOURS) les vues
include dirname(__FILE__).'/../view/signup.phtml';