<!DOCTYPE html>
<html>
<head>
	<title>Projet TOTO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

	<style type="text/css">
	body { padding-top: 70px; }
	</style>
</head>
<body>

	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Projet TOTO</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
            <li><a href="index.php"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Toutes les sessions</a></li>
            <li><a href="list.php"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Tous les étudiants</a></li>
            <li><a href="add.php"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Ajouter un étudiant</a></li>
            <li><a href="signup.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> S'inscrire</a></li>
            <li><a href="signin.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Se connecter</a></li>

            
          </ul>
	        <form action="list.php" class="navbar-form navbar-right" method="get">
				<div class="form-group">
					<input type="text" name="s" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-success btn-sm">Rechercher</button>
			</form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<?php if (!empty($currentPage)) : ?>
				<li class="active"><a href="#"><?= $currentPage ?></a></li>
			<?php endif; ?>
		</ol>