<?php
include ('template/head.php');
include ('controller/formProfilCustomerController.php');
?>
<header>
    <div class="container-fluid text-center" id="banniereHeader">
        <img class="img-fluid" src="assets/img/banniereTheFitLab.jpg" alt="banniere"/>
    </div>
</header>
<div class="container">
    <div class="row text-center">
        <div class="col-md-12 mt-3">
            <h1>Veuillez compléter ces informations afin de finaliser votre inscription et choisir votre coach!</h1>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-12">
            <form class="form-horizontal mt-3" name="formProfilClient" method="POST" action="formProfilCustomer.php" enctype="multipart/form-data">
                <fieldset>
                    <!-- Form Name -->
                    <legend>Compléter votre profil:</legend>
                    <div class="form-group">
                        <label for="clientGoal">Quels sont vos objectifs physique et sportif?(grosse perte de poids, prise de masse, sèche, prise de force, préparation d'un concours)</label>
                        <textarea class="form-control" id="clientGoal" name="clientGoal" rows="3" value="<?= isset($clientGoal) ? $clientGoal : '' ?>"></textarea>
                        <?= showError('clientGoal') ?>
                    </div>
                    <div class="form-group">
                        <label for="sportActivity">Combien de fois par semaine pratiquez vous une activité sportive actuellement?</label>
                        <input class="col-2" type="number" class="form-control" id="sportActivity" name="sportActivity" value="<?= isset($sportActivity) ? $sportActivity : '' ?>" />
                        <?= showError('sportActivity') ?>
                    </div>
                    <div class="form-group">
                        <label for="weightInit">Veuillez indiquer votre poid actuel en kg:</label>
                        <input class="col-2" type="number" class="form-control" id="weightInit" name="weightInit" value="<?= isset($weightInit) ? $weightInit : '' ?>" />
                        <?= showError('weightInit') ?>
                    </div>
                    <div class="form-group">
                        <label for="meteringBicepsInit">Veuillez indiquer la mesure de votre biceps en cm:</label>
                        <input class="col-2" type="number" class="form-control" id="meteringBicepsInit" name="meteringBicepsInit" value="<?= isset($meteringBicepsInit) ? $meteringBicepsInit : '' ?>" />
                        <?= showError('meteringBicepsInit') ?>
                    </div>
                    <div class="form-group">
                        <label for="meteringChestInit">Veuillez indiquer la mesure de votre torse en cm:</label>
                        <input class="col-2" type="number" class="form-control" id="meteringChestInit" name="meteringChestInit" value="<?= isset($meteringChestInit) ? $meteringChestInit : '' ?>" />
                        <?= showError('meteringChestInit') ?>
                    </div>
                    <div class="form-group">
                        <label for="meteringWaistLineInit">Veuillez indiquer la mesure de votre taille en cm:</label>
                        <input class="col-2" type="number" class="form-control" id="meteringWaistLineInit" name="meteringWaistLineInit" value="<?= isset($meteringWaistLineInit) ? $meteringWaistLineInit : '' ?>" />
                        <?= showError('meteringWaistLineInit') ?>
                    </div>
                    <div class="form-group">
                        <label for="meteringLegInit">Veuillez indiquer la mesure de votre cuisse en cm:</label>
                        <input class="col-2" type="number" class="form-control" id="meteringLegInit" name="meteringLegInit" value="<?= isset($meteringLegInit) ? $meteringLegInit : '' ?>" />
                        <?= showError('meteringLegInit') ?>
                    </div>
                    <div class="custom-file col-3">
                        <input type="file" class="custom-file-input" id="pictureFront" name="pictureFront">
                        <?= showError('pictureFront') ?>
                        <label class="custom-file-label" for="pictureFront">Photo de vous de face</label>
                    </div>
                </fieldset>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3 mb-3" name="submitProfilClient" id="submitProfilClient">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>
