<?php
include ('template/head.php');
include ('controller/listProgramCoachController.php');
include ('template/coachHeader.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-sm mt-5 text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Client</th>
                        <th>Programme</th>
                        <th>Détail</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($programList as $program) { ?>
                        <tr>
                        <td><?=$program->firstname.' '. $program->lastname?></td>
                        <td><?=$program->name?></td>
                        <td><a href="viewCoachProgram.php?id=<?=$program->idCustomer?>">détail</a></td>
                        <td><a href="updateProgram.php?id=<?=$program->idCustomer?>">Modifier</a></td>
                        <td><a type="submit" href="listProgramCoach.php?id=<?=$program->id?>&action=delete" class="text-danger">Supprimer</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>
