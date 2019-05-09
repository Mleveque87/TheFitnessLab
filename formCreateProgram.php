<?php
include ('template/head.php');
include ('controller/formCreateProgramController.php');
include ('template/coachHeader.php');
?>
<div class="container">
    <form method="POST" action="formCreateProgram.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">
                <label class="label" for="customer">Choix du client: </label>
                <select class="form-control select"  name="customer" id="customer">
                    <option value="0">Sélectionner Votre client</option>
                    <?php foreach ($coachCustomerList as $coachCustomer) { ?>
                    <option <?= isset($customer) ? 'selected' : '' ?> value="<?= $coachCustomer->idUser ?>"><?= $coachCustomer->firstname . ' ' . $coachCustomer->lastname ?></option>
                    <?php } ?>
                </select>
                <?= showError('customer') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <label for="programName">Nom du programme</label>
                <input class="form-control" value="<?= isset ($programName) ? $programName : '' ?>" name="programName" id="programName" placeholder="Nom du programme"/>
                <?= showError('programName') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <label for="workoutName1">Nom de la seance</label>
                <input class="form-control" value="<?= isset ($workoutName1) ? $workoutName1 : '' ?>" name="workoutName1" id="workoutName1" placeholder="Nom de la seance"/>
                <?= showError('workoutName1') ?>
            </div>
        </div>
        <div class="row">         
            <div class="col-md-12">
                <div class="col-md-8 offset-md-2">
                    <label class="label" for="bodytarget">Partie du corps : </label>
                    <select class="form-control select"  name="bodytarget" id="bodytarget">
                        <option value="0">Sélectionner une partie du corps</option>
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
                            <option value="0">Exercice</option>
                            <?php foreach ($exercices as $exercice) { ?>
                                <option value="<?= $exercice->id ?>"><?= $exercice->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('exercice1') ?>
                    </div>  

                    <div class="col-md-2">
                        <label class="label" for="tempo1">Tempo</label>
                        <select class="form-control select" name="tempo1" id="tempo1">
                            <option value="0">Tempo</option>
                            <?php foreach ($tempos as $tempo) { ?>
                                <option <?= isset($tempo1) ? 'selected' : '' ?> value="<?= $tempo->id ?>"><?= $tempo->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('tempo1') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="recovery1">Récupération</label>
                        <select class="form-control select" name="recovery1" id="recovery1">
                            <option value="0">Récupération</option>
                            <?php foreach ($recoverys as $recovery) { ?>
                                <option <?= isset($recovery1) ? 'selected' : '' ?> value="<?= $recovery->id ?>"><?= $recovery->time ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('recovery1') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="repetition1">Répétition</label>
                        <select class="form-control select" name="repetition1" id="repetition1">
                            <option value="0">Répétition</option>
                            <?php foreach ($repets as $repet) { ?>
                                <option <?= isset($repetition1) ? 'selected' : '' ?> value="<?= $repet->id ?>"><?= $repet->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('repetition1') ?>
                    </div>   
                    <div class="col-md-2">
                        <label class="label" for="serie1">Série</label>
                        <select class="form-control select" name="serie1" id="serie1">
                            <option value="0">Série</option>
                            <?php foreach ($series as $serie) { ?>
                                <option <?= isset($serie1) ? 'selected' : '' ?> value="<?= $serie->id ?>"><?= $serie->number ?></option>
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
                            <option value="0">Exercice</option>
                            <?php foreach ($exercices as $exercice) { ?>
                                <option value="<?= $exercice->id ?>"><?= $exercice->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('exercice2') ?>
                    </div>  

                    <div class="col-md-2">
                        <label class="label" for="tempo2">Tempo</label>
                        <select class="form-control select" name="tempo2" id="tempo2">
                            <option value="0">Tempo</option>
                            <?php foreach ($tempos as $tempo) { ?>
                                <option <?= isset($tempo2) ? 'selected' : '' ?> value="<?= $tempo->id ?>"><?= $tempo->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('tempo2') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="recovery2">Récupération</label>
                        <select class="form-control select" name="recovery2" id="recovery2">
                            <option value="0">Récupération</option>
                            <?php foreach ($recoverys as $recovery) { ?>
                                <option <?= isset($recovery2) ? 'selected' : '' ?> value="<?= $recovery->id ?>"><?= $recovery->time ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('recovery2') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="repetition2">Répétition</label>
                        <select class="form-control select" name="repetition2" id="repetition2">
                            <option value="0">Répétition</option>
                            <?php foreach ($repets as $repet) { ?>
                                <option <?= isset($repetition2) ? 'selected' : '' ?> value="<?= $repet->id ?>"><?= $repet->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('repetition2') ?>
                    </div>   
                    <div class="col-md-2">
                        <label class="label" for="serie2">Série</label>
                        <select class="form-control select" name="serie2" id="serie2">
                            <option value="0">Série</option>
                            <?php foreach ($series as $serie) { ?>
                                <option <?= isset($serie2) ? 'selected' : '' ?> value="<?= $serie->id ?>"><?= $serie->number ?></option>
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
                            <option value="0">Exercice</option>
                            <?php foreach ($exercices as $exercice) { ?>
                                <option value="<?= $exercice->id ?>"><?= $exercice->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('exercice3') ?>
                    </div>  

                    <div class="col-md-2">
                        <label class="label" for="tempo3">Tempo</label>
                        <select class="form-control select" name="tempo3" id="tempo3">
                            <option value="0">Tempo</option>
                            <?php foreach ($tempos as $tempo) { ?>
                                <option <?= isset($tempo3) ? 'selected' : '' ?> value="<?= $tempo->id ?>"><?= $tempo->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('tempo3') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="recovery3">Récupération</label>
                        <select class="form-control select" name="recovery3" id="recovery3">
                            <option value="0">Récupération</option>
                            <?php foreach ($recoverys as $recovery) { ?>
                                <option <?= isset($recovery3) ? 'selected' : '' ?> value="<?= $recovery->id ?>"><?= $recovery->time ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('recovery3') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="repetition3">Répétition</label>
                        <select class="form-control select" name="repetition3" id="repetition2">
                            <option value="0">Répétition</option>
                            <?php foreach ($repets as $repet) { ?>
                                <option <?= isset($repetition3) ? 'selected' : '' ?> value="<?= $repet->id ?>"><?= $repet->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('repetition3') ?>
                    </div>   
                    <div class="col-md-2">
                        <label class="label" for="serie3">Série</label>
                        <select class="form-control select" name="serie3" id="serie3">
                            <option value="0">Série</option>
                            <?php foreach ($series as $serie) { ?>
                                <option <?= isset($serie3) ? 'selected' : '' ?> value="<?= $serie->id ?>"><?= $serie->number ?></option>
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
                            <option value="0">Exercice</option>
                            <?php foreach ($exercices as $exercice) { ?>
                                <option value="<?= $exercice->id ?>"><?= $exercice->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('exercice4') ?>
                    </div>  

                    <div class="col-md-2">
                        <label class="label" for="tempo4">Tempo</label>
                        <select class="form-control select" name="tempo4" id="tempo4">
                            <option value="0">Tempo</option>
                            <?php foreach ($tempos as $tempo) { ?>
                                <option <?= isset($tempo4) ? 'selected' : '' ?> value="<?= $tempo->id ?>"><?= $tempo->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('tempo4') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="recovery4">Récupération</label>
                        <select class="form-control select" name="recovery4" id="recovery4">
                            <option value="0">Récupération</option>
                            <?php foreach ($recoverys as $recovery) { ?>
                                <option <?= isset($recovery4) ? 'selected' : '' ?> value="<?= $recovery->id ?>"><?= $recovery->time ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('recovery4') ?>
                    </div>   

                    <div class="col-md-2">
                        <label class="label" for="repetition4">Répétition</label>
                        <select class="form-control select" name="repetition4" id="repetition4">
                            <option value="0">Répétition</option>
                            <?php foreach ($repets as $repet) { ?>
                                <option <?= isset($repetition4) ? 'selected' : '' ?> value="<?= $repet->id ?>"><?= $repet->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('repetition4') ?>
                    </div>   
                    <div class="col-md-2">
                        <label class="label" for="serie4">Série</label>
                        <select class="form-control select" name="serie4" id="serie4">
                            <option value="0">Série</option>
                            <?php foreach ($series as $serie) { ?>
                                <option <?= isset($serie4) ? 'selected' : '' ?> value="<?= $serie->id ?>"><?= $serie->number ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('serie4') ?>
                    </div>   
                </div>
            </div>
            <input class="btn btn-block btn-primary mt-4 mb-4" type="submit" name="submitProgram" id="submitProgram" value="valider" />
            <?php if (isset ($isOk) && $isOk == false) { ?>
                <div class="col-md-12 alert alert-danger text-center" role="alert">
                    Une erreur est survenue lors de la création du programme. Veuillez réessayer plus tard.
                </div>
            <?php } ?>
        </div>
    </form>
</div>

<?php include ('template/footer.php'); ?>
