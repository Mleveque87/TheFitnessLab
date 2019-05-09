<?php
include ('template/head.php');
include ('controller/listCustomerController.php');
include ('template/coachHeader.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 d-md-flex text-center">
            <?php foreach ($customerList as $customer) { ?>
                <div class="card my-3" style="width: 18rem;">
                    <img src="assets/img/avatar.jpg" class="card-img-top img-fluid" alt="avatar">
                    <div class="card-body">
                        <h5 class="card-title"><?= $customer->firstname . ' ' . $customer->lastname ?></h5>
                        <p class="card-text">Objectif: <?= $customer->goal ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Date de naissance: <?= $customer->birthdate ?></li>
                        <li class="list-group-item">Activité sportive hebdomadaire: <?= $customer->sportActivity ?></li>
                        <li class="list-group-item"><img src="assets/upload/members/<?= $customer->idUserCustomer ?>/<?= $customer->pictureFront ?>" alt="<?= $customer->firstname . ' ' . $customer->lastname ?>" class="img-fluid" /></li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="viewProfilUserCoach.php?id=<?= $customer->idUserCustomer ?>" class="card-link">Voir Profil</a>
                        <form action="" method="POST">
                            <input type="hidden" value="<?= $_SESSION['idUser'] ?>" name="idUser" />
                            <input type="hidden" value="<?= $customer->idUserCustomer ?>" name="idUserCustomer" />
                            <input type="hidden" value="<?= $customer->idProgram ?>" name="idProgram" />
                            <button type="submit" name="delete" class="btn btn-danger">Supprimer de mes clients</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>