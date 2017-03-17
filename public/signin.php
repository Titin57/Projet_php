<?php

// Inclusion de config.php
require dirname(__FILE__).'/../inc/config.php';

/*echo md5('azerty').'<br>';
echo password_hash('azerty', PASSWORD_BCRYPT);
exit;*/

//Debug
print_r($_SESSION);

// Formulaire soumis
if (!empty($_POST)) {
	// Debug
	print_r($_POST);

	// Je récupère les données
	$emailToto = isset($_POST['emailToto']) ? trim($_POST['emailToto']) : '';
	$passwordToto1 = isset($_POST['passwordToto1']) ? trim($_POST['passwordToto1']) : '';
	// tableau d'erreurs
	$errorList = array();

	// Je valide les données
	if (empty($emailToto)) {
		$errorList[] = 'Email vide';
	}

	// Aucune erreur
	if (empty($errorList)) {
		// Alors je vérifie l'email & password en DB !!!!
		/*$sql = '
			SELECT usr_id
			FROM user
			WHERE usr_email = :email
			AND usr_password = :password
		';*/
		$sql = '
			SELECT usr_id, usr_password
			FROM user
			WHERE usr_email = :email
		';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':email', $emailToto);
		//$sth->bindValue(':password', md5('*'.$passwordToto1.'!$¨ben'));

		// J'exécute
		if ($sth->execute() === false) {
			print_r($sth->errorInfo());
		}
		else {
			// Si au moins 1 résultat => je teste le password
			if ($sth->rowCount() > 0) {
				// Je récupère la 1ère ligne de résultat
				$row = $sth->fetch(PDO::FETCH_ASSOC);

				// Je vérifie le mot de passe
				if (password_verify($passwordToto1, $row['usr_password'])) {
					echo 'connexion OK';
				}
				else {
					echo 'email/password non reconnus';
				}
			}
			else {
				echo 'email non reconnus';
			}
		}

	}
}




// A la fin (TOUJOURS) les vues
include dirname(__FILE__).'/../view/signin.phtml';