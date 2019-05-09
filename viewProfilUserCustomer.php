<?php
include ('template/head.php');
include ('controller/viewProfilUserCustomerController.php');
include ('template/customerHeader.php');
?>
<div class="container">
    <h1 class="text-center">Information Personnel</h1>
    <div class="row">
        <div class="col-md-12 d-md-flex text-center py-3">
            <div class="col-md-4">
                <img class="img-fluid" src="assets/img/avatar.jpg">
            </div>
            <div class="col-md-8">
                <p class="font-weight-bold">Nom: <?= $userInfo->lastname ?></p>
                <p class="font-weight-bold">Prénoms: <?= $userInfo->firstname ?></p>
                <p class="font-weight-bold">Date de naissance: <?= $userInfo->birthdate ?></p>
                <p class="font-weight-bold">mail: <?= $userInfo->mail ?></p>
            </div>
        </div>
    </div>
    <h1 class="text-center py-3">Information Coach</h1>
    <div class="row">
        <div class="col-md-12 d-md-flex text-center py-3">
            <div class="col-md-4">
                <p class="font-weight-bold">Carte d'educateur sportif:</p>
                <img class="img-fluid" src="assets/upload/members/<?= $coachInstance->id ?>/<?= $coachInstance->pictureBjeps ?>"</img>
            </div>
            <div class="col-md-8">
                <p class="font-weight-bold">Année d'expérience :<?= $coachInstance->experience ?></p>
                <p class="font-weight-bold">biographie: <?= $coachInstance->bio ?></p>
            </div>
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>