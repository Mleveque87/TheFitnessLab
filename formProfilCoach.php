<?php
include ('template/head.php');
include ('controller/formProfilCoachController.php');
?>
<header>
    <div class="container-fluid text-center" id="banniereHeader">
        <img class="img-fluid" src="assets/img/banniereTheFitLab.jpg" alt="banniere"/>
    </div>
</header>
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-12 text-center">
            <form class="form-horizontal mt-3" name="formProfilClient" method="POST" action="formProfilCoach.php" enctype="multipart/form-data">
                <fieldset>
                    <!-- Form Name -->
                    <legend>Compléter votre profil de coach:</legend>
                    <div class="custom-file mb-3 col-3">
                        <input type="file" class="custom-file-input" id="pictureBjeps" name="pictureBjeps" />
                        <?= showError('pictureBjeps') ?>
                        <label class="custom-file-label" for="pictureBjeps">Copie de votre carte</label>
                    </div>
                    <div class="form-group">
                        <label for="coachExperience">Combien d'années d'expérience avez vous?</label>
                        <input type="number" class="form-control" id="coachExperience" name="coachExperience" value="<?= isset($coachExperience) ? $coachExperience : '' ?>" />
                        <?= showError('coachExperience') ?>
                    </div>
                    <div class="form-group">
                        <label for="coachBio">Rédiger une biographie et expliquer votre philosophie du coaching:</label>
                        <textarea class="form-control" id="coachBio" name="coachBio" rows="5" value="<?= isset($coachBio) ? $coachBio : '' ?>"></textarea>
                        <?= showError('coachBio') ?>
                    </div>
                </fieldset>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary mt-3 text-center" name="submitProfilCoach" id="submitProfilCoach">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>


