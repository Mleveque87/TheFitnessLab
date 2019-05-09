<?php
include ('template/head.php');
include ('controller/formRegisterController.php');
?>
<header>
    <div class="container-fluid col-12 text-center" id="banniereHeader">
        <img class="img-fluid" src="assets/img/banniereTheFitLab.jpg" alt="banniere"/>
    </div>
</header>
<div class="container my-3">
    <div class="row align-items-center">
        <div class="col-md-12">
            <form name="formRegister" id="formRegister" method="POST" action="formRegister.php" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-6">
                        <label for="firstName">Prénom</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Votre prénom" value="<?= isset($firstName) ? $firstName : '' ?>" />
                        <?= showError('firstName') ?>
                    </div>
                    <div class="col-6">
                        <label for="lastName">Nom</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Votre nom" value="<?= isset($lastName) ? $lastName : '' ?>" />
                        <?= showError('lastName') ?>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-6">
                        <label for="birthDate">Date de naissance</label>
                        <input type="date" class="form-control" id="birthDate" name="birthDate" placeholder="Date de naissance" value="<?= isset($birthDate) ? $birthDate : '' ?>" />
                        <?= showError('birthDate') ?>
                    </div>
                    <div class="col-6">
                        <label for="gender">Genre</label>
                        <select class="custom-select" name="gender" id="gender">
                            <option value="0">Selectionner votre genre</option>
                            <?php foreach ($genderList as $gender) { ?>
                                <option value="<?= $gender->id ?>"><?= $gender->type ?></option>
                            <?php } ?>
                        </select>
                        <?= showError('gender') ?>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-12">
                        <label for="mailRegister">Adresse mail</label>
                        <input type="text" class="form-control" id="mailRegister" name="mailRegister" placeholder="Votre email" value="<?= isset($mailRegister) ? $mailRegister : '' ?>">
                        <?= showError('mailRegister') ?>
                        <div class="mailMessage"></div>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-12">
                        <label for="mailRegisterConfirm">Adresse mail</label>
                        <input type="text" class="form-control" id="mailRegisterConfirm" name="mailRegisterConfirm" placeholder="Confirmer Votre email" value="<?= isset($mailRegisterConfirm) ? $mailRegisterConfirm : '' ?>">
                        <?= showError('mailRegisterConfirm') ?>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-12">
                        <label for="passwordRegister">Mot de passe</label>
                        <input type="password" class="form-control" id="passwordRegister" name="passwordRegister" placeholder="Mot de passe" value="<?= isset($passwordRegister) ? $passwordRegister : '' ?>">
                        <?= showError('passwordRegister') ?>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-12">
                        <label for="passwordConfirmRegister">Confirmation mot de passe</label>
                        <input type="password" class="form-control" id="passwordConfirmRegister" name="passwordConfirmRegister" placeholder="Confirmer votre password" value="<?= isset($passwordConfirmRegister) ? $passwordConfirmRegister : '' ?>">
                        <?= showError('passwordConfirmRegister') ?>
                    </div>
                </div>
                <div class="col-6 mt-3">
                    <label for="role">etes vous coach ou client?</label>
                    <select class="custom-select" name="role" id="role">
                        <option value="0">Selectionner votre type d'utilisation</option>
                        <?php foreach ($roleList as $role) { ?>
                            <option value="<?= $role->id ?>"><?= $role->name ?></option>
                        <?php } ?>
                    </select>
                    <?= showError('role') ?>
                </div>
                <small id="emailHelp" class="form-text text-muted text-center mt-3">Ces informations seront utilisées uniquement sur le site The Fit Lab et ne seront en aucun cas utilisées à des fins commerciales</small>
                <div class="mt-3 text-center">
                    <button type="submit" class="btn btn-primary" name="submitRegister" id="submitRegister"><i class="fas fa-check"></i> Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>