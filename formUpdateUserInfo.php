<?php
include ('template/head.php');
include ('controller/formUpdateUserInfoController.php');
if ($_SESSION['role'] == 2) {
    include ('template/coachHeader.php');
} else if ($_SESSION['role'] == 3) {
    include ('template/customerHeader.php');
}
?>
<div class="container my-3">
    <form name="formRegister" id="formRegister" method="POST" action="formUpdateUserInfo.php" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-6">
                <label for="firstName">Prénom</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Votre prénom" value="<?= $userInfo->firstname ?>">
                <?= showError('firstName') ?>
            </div>
            <div class="col-6">
                <label for="lastName">Nom</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Votre nom" value="<?= $userInfo->lastname ?>">
                <?= showError('lastName') ?>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col-6">
                <label for="birthDate">Date de naissance</label>
                <input type="date" class="form-control" id="birthDate" name="birthDate" placeholder="Date de naissance" value="<?= $userInfo->birthdate ?>">
                <?= showError('birthDate') ?>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col-12">
                <label for="mailRegister">Adresse mail</label>
                <input type="text" class="form-control" id="mailRegister" name="mailRegister" placeholder="Votre email" value="<?= $userInfo->mail ?>">
                <?= showError('mailRegister') ?>
                <div class="mailMessage"></div>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col-12">
                <label for="mailRegisterConfirm">Confirmation Adresse mail</label>
                <input type="text" class="form-control" id="mailRegisterConfirm" name="mailRegisterConfirm" placeholder="Confirmer Votre email" value="<?= isset($mailRegisterConfirm) ? $mailRegisterConfirm : '' ?>">
                <?= showError('mailRegisterConfirm') ?>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col-12">
                <label for="passwordRegister">Mot de passe</label>
                <input type="password" class="form-control" id="passwordRegister" name="passwordRegister" placeholder="Mot de passe" value="">
                <?= showError('passwordRegister') ?>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col-12">
                <label for="passwordConfirmRegister">Confirmation mot de passe</label>
                <input type="password" class="form-control" id="passwordConfirmRegister" name="passwordConfirmRegister" placeholder="Confirmer votre password" value="">
                <?= showError('passwordConfirmRegister') ?>
            </div>
        </div>
        <div class="mt-3 text-center">
            <input type="submit" class="btn btn-primary" name="submitRegister" id="submitRegister" value="valider" />
        </div>
    </form>
</div>
<?php include ('template/footer.php'); ?>
