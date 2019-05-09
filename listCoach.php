<?php
include ('template/head.php');
include ('controller/listCoachController.php');
include ('template/customerHeader.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 d-md-flex text-center">
            <?php foreach ($coachList as $coach) { ?>
                <div class="card my-3 mx-3" style="width: 18rem;">
                    <img src="assets/img/avatar.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $coach->firstname . ' ' . $coach->lastname ?></h5>
                        <p class="card-text">Bio: <?= $coach->bio ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Date de naissance: <?= $coach->birthdate ?></li>
                        <li class="list-group-item">Années d'expérience: <?= $coach->experience ?> ans</li>
                        <li class="list-group-item"><img src="assets/upload/members/<?= $coach->idUser ?>/<?= $coach->pictureBjeps ?>" class="img-fluid" alt="<?= $coach->firstname . ' ' . $coach->lastname ?>"</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="viewProfilUserCustomer.php?id=<?= $coach->idUser ?>" class="card-link">Voir profil</a>
                        <a href="profilCustomer.php?idUserCoach=<?= $coach->idUser ?>" class="card-link">Choisir ce Coach</a>
                    </div>
                </div>  
            <?php } ?>
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>