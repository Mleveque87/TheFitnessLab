<?php
include ('template/head.php');
include ('controller/UpdateProgramController.php');
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
        <form method="POST" action="updateProgram.php" enctype="multipart/form-data">>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <label for="programName">Nom du programme</label>
                <input class="form-control" value="<?= $programInstanceList[0]->nameProgram ?>" name="programName" id="programName" placeholder="Nom du programme"/>
                <?= showError('programName') ?>
            </div>
        </div>
                <div class="row">
            <div class="col-md-8 offset-md-2">
                <label for="workoutName1">Nom de la seance</label>
                <input class="form-control" value="<?= $programInstanceList[0]->nameWorkout ?>" name="workoutName1" id="workoutName1" placeholder="Nom de la seance"/>
                <?= showError('workoutName1') ?>
            </div>
        </div>
        <div class="row">         
            <div class="col-md-12">
                <div class="col-md-8 offset-md-2">
                    <label class="label" for="bodytarget">Partie du corps : </label>
                    <select class="form-control select"  name="bodytarget" id="bodytarget">
                        <option value="<?=$programInstanceList[0]->idBodytarget?>"><?=$programInstanceList[0]->nameBodytarget?></option>
                        <?php foreach ($bodytarget as $body) { ?>
                            <option value="<?= $body->id ?>"><?= $body->name ?></option>
                        <?php } ?>
                    </select>
                    <?= showError('bodytarget') ?>
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <div class="row mt-3">
                    <div class="col-md-2 offset-md-1">
                        <label class="label" for="exercice1">Exercice : </label>
                        <select class="form-control select" name="exercice1" id="exercice1">
                            <option value="<?=$programInstanceList[0]->idExercice?>"><?=$programInstanceList[0]->typeExercice?></option>
                            <?php foreach ($exercices as $exercice) { ?>
                                <option value="<?= $exercice->id ?>"><?= $exercice->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('exercice1') ?>
                    </div>  

                    <div class="col-md-2">
                        <label class="label" for="tempo1">Tempo</label>
                        <select class="form-control select" name="tempo1" id="tempo1">
                            <option value="<?=$programInstanceList[0]->idTempo?>"><?=$programInstanceList[0]->typeTempo?></option>
                            <?php foreach ($tempos as $tempo) { ?>
                                <option value="<?= $tempo->id ?>"><?= $tempo->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('tempo1') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="recovery1">Récupération</label>
                        <select class="form-control select" name="recovery1" id="recovery1">
                            <option value="<?=$programInstanceList[0]->idRecovery?>"><?=$programInstanceList[0]->timeRecovery?></option>
                            <?php foreach ($recoverys as $recovery) { ?>
                                <option value="<?= $recovery->id ?>"><?= $recovery->time ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('recovery1') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="repetition1">Répétition</label>
                        <select class="form-control select" name="repetition1" id="repetition1">
                            <option value="<?=$programInstanceList[0]->idRepetition?>"><?=$programInstanceList[0]->numberRepetition?></option>
                            <?php foreach ($repets as $repet) { ?>
                                <option value="<?= $repet->id ?>"><?= $repet->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('repetition1') ?>
                    </div>   
                    <div class="col-md-2">
                        <label class="label" for="serie1">Série</label>
                        <select class="form-control select" name="serie1" id="serie1">
                            <option value="<?= $programInstanceList[0]->idSerie ?>"><?= $programInstanceList[0]->numberSerie ?></option>
                            <?php foreach ($series as $serie) { ?>
                                <option value="<?= $serie->id ?>"><?= $serie->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('serie1') ?>
                    </div>   
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <div class="row mt-3">
                    <div class="col-md-2 offset-md-1">
                        <label class="label" for="exercice2">Exercice : </label>
                        <select class="form-control select" name="exercice2" id="exercice2">
                            <option value="<?=$programInstanceList[1]->idExercice?>"><?=$programInstanceList[1]->typeExercice?></option>
                            <?php foreach ($exercices as $exercice) { ?>
                                <option value="<?= $exercice->id ?>"><?= $exercice->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('exercice2') ?>
                    </div>  

                    <div class="col-md-2">
                        <label class="label" for="tempo2">Tempo</label>
                        <select class="form-control select" name="tempo2" id="tempo2">
                            <option value="<?= $programInstanceList[1]->idTempo ?>"><?= $programInstanceList[1]->typeTempo ?></option>
                            <?php foreach ($tempos as $tempo) { ?>
                                <option value="<?= $tempo->id ?>"><?= $tempo->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('tempo2') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="recovery2">Récupération</label>
                        <select class="form-control select" name="recovery2" id="recovery2">
                            <option value="<?= $programInstanceList[1]->idRecovery ?>"><?= $programInstanceList[1]->timeRecovery ?></option>
                            <?php foreach ($recoverys as $recovery) { ?>
                                <option value="<?= $recovery->id ?>"><?= $recovery->time ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('recovery2') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="repetition2">Répétition</label>
                        <select class="form-control select" name="repetition2" id="repetition2">
                            <option value="<?= $programInstanceList[1]->idRepetition ?>"><?= $programInstanceList[1]->numberRepetition ?></option>
                            <?php foreach ($repets as $repet) { ?>
                                <option value="<?= $repet->id ?>"><?= $repet->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('repetition2') ?>
                    </div>   
                    <div class="col-md-2">
                        <label class="label" for="serie2">Série</label>
                        <select class="form-control select" name="serie2" id="serie2">
                             <option value="<?= $programInstanceList[1]->idSerie ?>"><?= $programInstanceList[1]->numberSerie ?></option>
                            <?php foreach ($series as $serie) { ?>
                                <option value="<?= $serie->id ?>"><?= $serie->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('serie2') ?>
                    </div>   
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <div class="row mt-3">
                    <div class="col-md-2 offset-md-1">
                        <label class="label" for="exercice3">Exercice : </label>
                        <select class="form-control select" name="exercice3" id="exercice3">
                            <option value="<?=$programInstanceList[2]->idExercice?>"><?=$programInstanceList[2]->typeExercice?></option>
                            <?php foreach ($exercices as $exercice) { ?>
                                <option value="<?= $exercice->id ?>"><?= $exercice->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('exercice3') ?>
                    </div>  

                    <div class="col-md-2">
                        <label class="label" for="tempo3">Tempo</label>
                        <select class="form-control select" name="tempo3" id="tempo3">
                            <option value="<?= $programInstanceList[2]->idTempo ?>"><?= $programInstanceList[2]->typeTempo ?></option>
                            <?php foreach ($tempos as $tempo) { ?>
                                <option value="<?= $tempo->id ?>"><?= $tempo->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('tempo3') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="recovery3">Récupération</label>
                        <select class="form-control select" name="recovery3" id="recovery3">
                            <option value="<?= $programInstanceList[2]->idRecovery ?>"><?= $programInstanceList[2]->timeRecovery ?></option>
                            <?php foreach ($recoverys as $recovery) { ?>
                                <option value="<?= $recovery->id ?>"><?= $recovery->time ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('recovery3') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="repetition3">Répétition</label>
                        <select class="form-control select" name="repetition3" id="repetition2">
                            <option value="<?= $programInstanceList[2]->idRepetition ?>"><?= $programInstanceList[2]->numberRepetition ?></option>
                            <?php foreach ($repets as $repet) { ?>
                                <option value="<?= $repet->id ?>"><?= $repet->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('repetition3') ?>
                    </div>   
                    <div class="col-md-2">
                        <label class="label" for="serie3">Série</label>
                        <select class="form-control select" name="serie3" id="serie3">
                            <option value="<?= $programInstanceList[2]->idSerie ?>"><?= $programInstanceList[2]->numberSerie ?></option>
                            <?php foreach ($series as $serie) { ?>
                                <option value="<?= $serie->id ?>"><?= $serie->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('serie3') ?>
                    </div>   
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <div class="row mt-3">
                    <div class="col-md-2 offset-md-1">
                        <label class="label" for="exercice4">Exercice : </label>
                        <select class="form-control select" name="exercice4" id="exercice4">
                            <option value="<?=$programInstanceList[3]->idExercice?>"><?=$programInstanceList[3]->typeExercice?></option>
                            <?php foreach ($exercices as $exercice) { ?>
                                <option value="<?= $exercice->id ?>"><?= $exercice->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('exercice4') ?>
                    </div>  

                    <div class="col-md-2">
                        <label class="label" for="tempo4">Tempo</label>
                        <select class="form-control select" name="tempo4" id="tempo4">
                            <option value="<?= $programInstanceList[3]->idTempo ?>"><?= $programInstanceList[3]->typeTempo ?></option>
                            <?php foreach ($tempos as $tempo) { ?>
                                <option value="<?= $tempo->id ?>"><?= $tempo->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('tempo4') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="recovery4">Récupération</label>
                        <select class="form-control select" name="recovery4" id="recovery4">
                             <option value="<?= $programInstanceList[3]->idRecovery ?>"><?= $programInstanceList[3]->timeRecovery ?></option>
                            <?php foreach ($recoverys as $recovery) { ?>
                                <option value="<?= $recovery->id ?>"><?= $recovery->time ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('recovery4') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="repetition4">Répétition</label>
                        <select class="form-control select" name="repetition4" id="repetition4">
                            <option value="<?= $programInstanceList[3]->idRepetition ?>"><?= $programInstanceList[3]->numberRepetition ?></option>
                            <?php foreach ($repets as $repet) { ?>
                                <option value="<?= $repet->id ?>"><?= $repet->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('repetition4') ?>
                    </div>   
                    <div class="col-md-2">
                        <label class="label" for="serie4">Série</label>
                        <select class="form-control select" name="serie4" id="serie4">
                            <option value="<?= $programInstanceList[3]->idSerie ?>"><?= $programInstanceList[3]->numberSerie ?></option>
                            <?php foreach ($series as $serie) { ?>
                                <option value="<?= $serie->id ?>"><?= $serie->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('serie4') ?>
                    </div>   
                </div>
            </div>
            <input class="btn btn-block btn-primary mt-4 mb-4" type="submit" name="submitProgram" id="submitProgram" value="valider" />
            <?php if (isset ($isOk) && $isOk == false) { ?>
                <div class="col-md-12 alert alert-danger text-center" role="alert">
                    Une erreur est survenue lors de la modification du programme. Veuillez réessayer plus tard.
                </div>
            <?php } ?>
        </div>
    </form>
</div>

<?php include ('template/footer.php'); ?>
