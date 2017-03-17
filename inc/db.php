<?php

// Je souhaite me connecter à la DB
$dsn = 'mysql:host='.$config['DB_host'].';dbname='.$config['DB_database'].';charset=utf8'; // Data Source Name

// try = essai d'exécuter ce code
try {
	$pdo = new PDO($dsn, $config['DB_username'],$config['DB_password']);
}
// catch = intercepte toute erreur qui surviendrait dans ce code
catch(Exception $e) {
	echo 'Connexion échouée<br>';
	// Affiche le message d'erreur de l'exception
	echo $e->getMessage();
	exit;
}