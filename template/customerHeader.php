<?php 
include ('controller/navBarController.php');
?>
<header>
    <!--START BANNER-->
    <div class="col-12 text-center" id="banniereHeader">
        <img class="img-fluid" src="assets/img/banniereTheFitLab.jpg" alt="banniere"/>
    </div>
    <!--END BANNER-->
    <!-- START NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark" id="navBarprofil">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img src="assets/img/logoFitnessLabSmall.png" width="50" height="50" alt="logoTheFitnessLab">
            </a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="profilCustomer.php">Mon profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewCustomerProgram.php">Mon programme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listCoach.php">Liste des coachs</a>
                    </li> 
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </li>
                    <li class="nav-item avatar dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
<!--                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0" alt="avatar image">-->
                            <?= $_SESSION['firstName']; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
                            <a class="dropdown-item" href="profilCustomer.php">Mon Profil</a>
                            <a class="dropdown-item text-danger" href="?action=deleteUser">Supprimer mon compte</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?action=deconnexion">Déconnexion</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
</header>
