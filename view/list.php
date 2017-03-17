<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Liste des étudiants</div>
  <div class="panel-body">
  	<?php if (!empty($_GET['deleted'])) : ?>
		<div class="alert alert-success" role="alert">
			&Eacute;lément supprimé
		</div>
  	<?php endif; ?>
  	<?php if ($searchWord != '') : ?>
		<?= $nbResults ?> résultat(s) pour la recherche "<?= $searchWord ?>"
	<?php else : ?>

	    <?php if ($pageNo>1) : ?>
	   		<a href="list.php?page=<?= $pageNo-1 ?>&sesId=<?= $sessionId ?>" class="btn btn-xs btn-success">précédent</a>
		<?php endif; ?>
		
	    <a href="list.php?page=<?= $pageNo+1 ?>&sesId=<?= $sessionId ?>" class="btn btn-xs btn-success">suivant</a>
  	<?php endif; ?>
  </div>

  <!-- Table -->
  <table class="table">
  <thead>
  	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Email</th>
		<th>Date de naissance</th>
		<th></th>
  	</tr>
  </thead>
  <tbody>
  <?php foreach ($studentList as $currentStudent) : ?>
	<tr>
		<td><?= $currentStudent['stu_id']; ?></td>
		<td><?= $currentStudent['stu_lastname']; ?></td>
		<td><?= $currentStudent['stu_firstname']; ?></td>
		<td><?= $currentStudent['stu_email']; ?></td>
		<td><?= $currentStudent['stu_birthdate']; ?></td>
		<td>
			<a class="btn btn-xs btn-success" href="student.php?id=<?= $currentStudent['stu_id']; ?>">Détails</a>&nbsp;
			<!-- Single button -->
			<div class="btn-group">
				<button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</button>
				<ul class="dropdown-menu">
					<li><a href="student.php?deleteId=<?= $currentStudent['stu_id']; ?>">Oui, je veux supprimer</a></li>
					<li><a href="#">Annuler</a></li>
				</ul>
			</div>
		</td>
	</tr>
  <?php endforeach; ?>
  </tbody>
  </table>
</div>