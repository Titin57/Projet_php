<?php foreach ($sessionsList as $currentLocation=>$currentSessionsList) :?>

	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?= $currentLocation ?></h3>
	  </div>
		<!-- Table -->
		<table class="table">
		<thead>
			<tr>
				<th></th>
				<th>Début</th>
				<th>Fin</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($currentSessionsList as $currentRow) : ?>
			<tr>
				<td><a href="list.php?sesId=<?= $currentRow['ses_id'] ?>">#<?= $currentRow['ses_number'] ?></a></td>
				<td><a href="list.php?sesId=<?= $currentRow['ses_id'] ?>"><?= $currentRow['ses_start_date'] ?></a></td>
				<td><a href="list.php?sesId=<?= $currentRow['ses_id'] ?>"><?= $currentRow['ses_end_date'] ?></a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
	</div>

<?php endforeach; ?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Statistiques sur le nombre d'étudiants par ville</h3>
	</div>
	<table class="table">
	<thead>
		<tr>
			<th>Ville</th>
			<th>Nombre d'étudiants</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($studentsVilleList as $row) : ?>
		<tr>
			<td><?= $row['cit_name'] ?></td>
			<td><?= $row['nb'] ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>