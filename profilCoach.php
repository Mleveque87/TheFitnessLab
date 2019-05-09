<?php
include ('template/head.php');
include ('controller/profilCoachController.php');
include ('template/coachHeader.php');
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
        <div class="col-md-12 text-center mt-3">
            <a class="btn btn-primary" href="formUpdateUserInfo.php">Modifier</a>
        </div>
    </div>
    <h1 class="text-center py-3">Information Coach</h1>
    <div class="row">
        <div class="col-md-12 d-md-flex text-center py-3">
            <div class="col-md-4">
                <p class="font-weight-bold">Carte d'educateur sportif:</p>
                <img class="img-fluid" src="assets/upload/members/<?= $coach->id ?>/<?= $coach->pictureBjeps ?>"</img>
            </div>
            <div class="col-md-8">
                <p class="font-weight-bold">Année d'expérience :<?= $coach->experience ?></p>
                <p class="font-weight-bold">biographie: <?= $coach->bio ?></p>
            </div>
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>