<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">#<?= $studentInfos['stu_id'] ?> <?= $studentInfos['stu_firstname'] ?> <?= $studentInfos['stu_lastname'] ?></h3>
  </div>
  <div class="panel-body">
    Email : <?= $studentInfos['stu_email'] ?><br>
    Date de naissance : <?= $studentInfos['stu_birthdate'] ?><br>
    Age : <?= $studentInfos['age'] ?> an(s)<br>
    Ville : <?= $studentInfos['cit_name'] ?><br>
    Sympathie : <?= getSympathieName($studentInfos['stu_friendliness']) ?><br>
    <br>
    <a href="edit.php?id=<?= $studentInfos['stu_id'] ?>" class="btn btn-success btn-block">Modifier</a>
  </div>
</div>