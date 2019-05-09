<?php
include ('template/head.php');
include ('controller/formLoginController.php');
?>
<header>
    <div class="container-fluid text-center" id="banniereHeader">
        <img class="img-fluid" src="assets/img/banniereTheFitLab.jpg" alt="banniere"/>
    </div>
</header>
<div class="container mt-3 mb-3 d-flex justify-content-center text-center">
    <div class="row">
        <div class="col-md-12">
            <form name="formLogin" method="POST" action="formLogin.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="mailLogin">Email</label>
                    <input type="email" class="form-control col-12" id="mailLogin" name="mailLogin" aria-describedby="emailHelp" placeholder="Entrer votre email" />
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre mail à des fins commerciales</small>
                    <?= showError('mailLogin') ?>
                </div>
                <div class="form-group">
                    <label for="passwordLogin">Mot de passe</label>
                    <input type="password" class="form-control col-12" id="passwordLogin" name="passwordLogin" placeholder="Entrer votre mot de passe" />
                    <?= showError('passwordLogin') ?>
                </div>
                <div class="mt-3 text-center" id="buttonLogin">
                    <a href="formRegister.php" class="btn btn-primary">Inscription</a>
                    <button type="submit" class="btn btn-primary" name="submitLogin">Connexion</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ('template/footer.php'); ?>