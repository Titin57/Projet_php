<?php

// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

// ICI MON CODE POUR CETTE PAGE
$currentPage = 'Etudiant';

// Si suppression
if (isset($_GET['deleteId'])) {
	$id = intval($_GET['deleteId']);

	if (deleteStudent($id)) {
		header('Location: list.php?deleted=1');
		exit;
	}
}

// Je récupère le paramètre dans l'URL
$studentId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ici, j'ai mis la requete SQL dans la fonction "getStudentInfos", et maintenant, j'appelle cette fonction en donnant l'ID en paramètre
$studentInfos = getStudentInfos($studentId);

// FIN DE MON CODE POUR CETTE PAGE

// A la fin, TOUJOURS, les vues
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/student.php';
include dirname(dirname(__FILE__)).'/view/footer.php';