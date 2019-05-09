<?php
include ('template/head.php');
include ('controller/viewCustomerProgramController.php');
include ('template/customerHeader.php');
?>
<div class="container">
    <h1 class="text-center py-3">Mon programme</h1>
    <div class="row py-3"> 
        <div class="col-md-12 d-md-flex text-center">
            <div class="col-md-6 col-12">
                <h2>Client</h2>
                <div class="d-md-flex">
                    <div class="col-md-4">
                        <img class="img-fluid" src="assets/img/avatar.jpg">
                    </div>
                    <div class="col-md-8">
                        <p class="font-weight-bold">Nom: <?= $_SESSION['lastName'] ?></p>
                        <p class="font-weight-bold">Prénom: <?= $_SESSION['firstName'] ?></p>
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
                        <?php if (empty($coachInfo)) { ?>
                            <a href="listCoach.php" class="btn btn-primary">Ajouter un coach</a>
                        <?php } else { ?>
                            <p class="font-weight-bold">Nom: <?= $coachInfo->coachLastname ?></p>
                            <p class="font-weight-bold">Prénom: <?= $coachInfo->coachFirstname ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (empty($programInstanceList)) {
        if (!empty($coachInfo)) {
            ?>
            <p class="font-weight-bold text-center text-danger">Vous n'avez pas encore de programme disponible, Votre coach a été averti de votre demande de coaching.</p>
            <p class="font-weight-bold text-center text-danger">Votre programme sera disponible dans un délai d'une semaine.</p>
    <?php }
} else { ?>
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
    <?php foreach ($programInstanceList as $programInstanceDetail) { ?>
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
        <?php
        }
    }
    ?>
</div>

<?php include ('template/footer.php'); ?>