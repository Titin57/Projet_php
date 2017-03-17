<?php

// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

// ICI MON CODE POUR CETTE PAGE
$currentPage = 'Modification';


// Je récupère le paramètre dans l'URL
$studentId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Formulaire soumis
if (!empty($_POST)) {
	//print_r($_POST);exit;
	// Je récupère les données en GET
	$lastname = filterStringInputPost('stu_lastname');
	$firstname = filterStringInputPost('stu_firstname');
	$email = filterStringInputPost('stu_email');
	$birthdate = filterStringInputPost('stu_birthdate');
	$friendliness = filterIntInputPost('stu_friendliness', -1);
	$sessionId = filterIntInputPost('ses_id');
	$cityId = filterIntInputPost('cit_id');

	// Le tableau contenant toutes les valeurs
	$errorList = array();

	// Je teste toutes les erreurs
	if (empty($lastname)) {
		$errorList[] = 'Le nom est vide';
	}
	else if (strlen($lastname) < 2) {
		$errorList[] = 'Le nom est incorrect';
	}
	if (empty($firstname)) {
		$errorList[] = 'Le prénom est vide';
	}
	else if (strlen($firstname) < 2) {
		$errorList[] = 'Le prénom est incorrect';
	}
	if (empty($email)) {
		$errorList[] = 'L\'email est vide';
	}
	else if (filter_var($email,  FILTER_VALIDATE_EMAIL) === false) {
		$errorList[] = 'L\'email est incorrect';
	}
	if (empty($birthdate)) {
		$errorList[] = 'La date de naissance est vide';
	}
	if ($friendliness < 0 || $friendliness > 5) {
		$errorList[] = 'La sympathie est incorrecte';
	}
	if (empty($sessionId)) {
		$errorList[] = 'La session n\'est pas renseignée';
	}
	if (empty($cityId)) {
		$errorList[] = 'La ville n\'est pas renseignée';
	}

	// Si aucune erreur
	if (empty($errorList)) {
		// J'appelle la fonction de mise à jour du student
		$updateSuccess = updateStudent(
			$studentId,
			$lastname,
			$firstname,
			$email,
			$birthdate,
			$friendliness,
			$sessionId,
			$cityId
		);

		// Si modification ok
		if ($updateSuccess) {
			// Je redirige sur la meme page
			header('Location: edit.php?id='.$studentId);
			exit;
		}
	}
}

$studentInfos = getStudentInfos($studentId);

// Je récupère toutes les villes
$citiesList = getAllCities();

// Je récupère toutes les sessions
$sessionsList = getAllSessions();

// FIN DE MON CODE POUR CETTE PAGE

// A la fin, TOUJOURS, les vues
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/add.php';
include dirname(dirname(__FILE__)).'/view/footer.php';