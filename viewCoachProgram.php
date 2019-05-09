<?php
include ('template/head.php');
include ('controller/viewCoachProgramController.php');
include ('template/coachHeader.php');
?>
<div class="container">
    <h1 class="text-center py-3">Programme</h1>
    <div class="row py-3"> 
        <div class="col-md-12 d-md-flex text-center">
            <div class="col-md-6 col-12">
                <h2>Client</h2>
                <div class="d-md-flex">
                    <div class="col-md-4">
                        <img class="img-fluid" src="assets/img/avatar.jpg">
                    </div>
                    <div class="col-md-8">
                        <p class="font-weight-bold">Nom: <?= $customerInfo->customerLastname?></p>
                        <p class="font-weight-bold">Prénom: <?= $customerInfo->customerFirstname?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <h2>Coach</h2>
                <div class="d-md-flex">
                    <div class="col-md-4">
                        <img class="img-fluid" src="assets/img/avatar.jpg">
                    </div>
                    <div class="col-md-8">
                        <p class="font-weight-bold">Nom: <?=$programInstanceList[0]->lastname?></p>
                        <p class="font-weight-bold">Prénom: <?= $programInstanceList[0]->firstname ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-12 text-center">
            <h2>Nom du programme: <?= $programInstanceList[0]->nameProgram ?></h2>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-12 text-center">
            <h2>Nom de la séance: <?= $programInstanceList[0]->nameWorkout ?></h2>
        </div>
    </div>
        <?php foreach($programInstanceList as $programInstanceDetail){ ?>
    <div class="row py-3">
        <div class="col-md-12 d-md-flex text-center justify-content-between">
            <div class="col-md-4">
                <p class="font-weight-bold">exercice: <?= $programInstanceDetail->typeExercice ?></p>
            </div>
            <div class="col-md-2">
                <p class="font-weight-bold">tempo: <?= $programInstanceDetail->typeTempo ?></p>
            </div>
            <div class="col-md-2">
                <p class="font-weight-bold">récupération: <?= $programInstanceDetail->timeRecovery ?></p>
            </div>
            <div class="col-md-2">
                <p class="font-weight-bold">répétitions: <?= $programInstanceDetail->numberRepetition ?></p>
            </div>
            <div class="col-md-2">
                <p class="font-weight-bold">séries: <?= $programInstanceDetail->numberSerie ?></p>
            </div>
        </div>
    </div>
    <hr class="bg-success">
	<?php } ?>
    <div class="row">
        <div class="col-md-12">
            <button type=""</button> 
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>



