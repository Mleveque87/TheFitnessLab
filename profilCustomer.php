<?php
include ('template/head.php');
include ('controller/profilCustomerController.php');
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
        <div class="col-md-12 text-center mt-3">
            <a class="btn btn-primary" href="formUpdateUserInfo.php">Modifier</a>
        </div>
    </div>
    <h1 class="text-center py-3">Mon Evolution</h1>
    <div class="row">
        <div class="col-md-12 d-md-flex text-center py-3">
            <div class="col-md-4">
                <p class="font-weight-bold">Votre photo de départ :</p>
                <img class="img-fluid" src="assets/upload/members/<?=$userInfo->id?>/<?= $customerInstance->pictureFront ?>"</img>
            </div>
            <div class="col-md-8">
                <p class="font-weight-bold">Poid initial: <?= $customerInstance->weight ?></p>
                <p class="font-weight-bold">Objectif: <?= $customerInstance->goal ?></p>
                <p class="font-weight-bold">Votre activité sportive hebdomadaire: <?= $customerInstance->sportActivity ?></p>
                <p class="font-weight-bold">Votre tour de cuisse initial: <?= $customerInstance->meteringLeg ?></p>
                <p class="font-weight-bold">Votre tour de taille initial: <?= $customerInstance->meteringWaistline ?></p>
                <p class="font-weight-bold">Votre tour de torse ou poitrine initial: <?= $customerInstance->meteringChest ?></p>
                <p class="font-weight-bold">Votre tour de biceps initial: <?= $customerInstance->meteringBiceps ?></p>
            </div>
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>