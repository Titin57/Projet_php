<?php

// Inclusion de config.php
// double dirname pour retrouver le répertoire parent
require dirname(dirname(__FILE__)).'/inc/config.php';

// ICI MON CODE POUR CETTE PAGE
$currentPage = '';

// Je récupère toutes les sessions
$sessionsList = array();
$sql = '
	SELECT ses_id, ses_number, ses_start_date, ses_end_date, loc_name, tra_name
	FROM session
	INNER JOIN location ON location.loc_id = session.location_loc_id
	INNER JOIN training ON training.tra_id = session.training_tra_id
';
$sth = $pdo->query($sql);
if ($sth === false) {
	print_r($sth->errorInfo());
}
else {
	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
		$title = $row['tra_name'].' à '.$row['loc_name'];
		$sessionsList[$title][] = $row;
	}
}

// Stats nb students par ville
$sql = '
	SELECT count(*) as nb, cit_name
	FROM city
	INNER JOIN student ON student.city_cit_id = city.cit_id
	GROUP BY cit_name
	ORDER BY nb DESC, cit_name ASC
';
$sth = $pdo->query($sql);
if ($sth === false) {
	print_r($pdo->errorInfo());
}
else {
	$studentsVilleList = $sth->fetchAll(PDO::FETCH_ASSOC);
}

// FIN DE MON CODE POUR CETTE PAGE

// A la fin, TOUJOURS, les vues
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/home.php';
include dirname(dirname(__FILE__)).'/view/footer.php';