<?php

// Inclusion de config.php
require dirname(dirname(__FILE__)).'/inc/config.php';



//*******************************
//*******************************
//*******************************
//*******************************



// ICI MON CODE POUR CETTE PAGE
$currentPage = 'Tous les étudiants';

// Je récupère le paramètre d'URL/URI "page"
if (isset($_GET['page'])) {
	$pageNo = $_GET['page'];
}
else {
	// Sinon, page n°1 par défaut
	$pageNo = 1;
}
// Je calcule l'offset à partir du numéro de page
$pageOffset = ($pageNo-1) * 5;
/*
1 => 0
2 => 5
3 => 10
4 => 15
*/

// Je récupère l'ID de la session si fourni
$sessionId = isset($_GET['sesId']) ? intval($_GET['sesId']) : 0;

// Je récupère le mot recherché
$searchWord = isset($_GET['s']) ? trim(strip_tags($_GET['s'])) : '';


$sql = '
	SELECT stu_id, stu_lastname, stu_firstname, stu_email, stu_birthdate
	FROM student
	LEFT OUTER JOIN city ON city.cit_id = student.city_cit_id
	WHERE 1=1
';
// Si l'ID session est fourni => filtrer sur cet ID
if ($sessionId > 0) {
	$sql .= '
		AND session_ses_id = :sessionId';
}
// Si recherche
if ($searchWord != '') {
	$sql .= '
		AND (
			stu_email LIKE :search
			OR stu_lastname LIKE :search
			OR stu_firstname LIKE :search
			OR cit_name LIKE :search
		)
	';
}
else {
	// si pas de sessionId fourni et si pas de recherche alors on applique une limite de 5 résultats à la requette 
	$sql .= '
		LIMIT 5 OFFSET '.$pageOffset;
}
//print_r($sql);exit;
$sth = $pdo->prepare($sql);
if ($sessionId > 0) {
	$sth->bindValue(':sessionId', $sessionId);
}
if ($searchWord != '') {
	$sth->bindValue(':search', '%'.$searchWord.'%');
}

if ($sth->execute() === false) {
	print_r($sth->errorInfo());
}
else {
	$studentList = $sth->fetchAll(PDO::FETCH_ASSOC);
	$nbResults = $sth->rowCount();
}








// FIN DE MON CODE POUR CETTE PAGE

// A la fin, TOUJOURS, les vues
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/list.php';
include dirname(dirname(__FILE__)).'/view/footer.php';