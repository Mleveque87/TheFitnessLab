<?php
// Base de données
// définition de constantes avec les informations de connexion
define('HOST','localhost');
define('DBNAME','thefitnesslab');
define('LOGIN','root');//actuellement en root pour l'environment de dev
define('PASSWORD','');
// Appel des modèles
include_once ('model/database.php');
include_once ('model/gender.php');
include_once ('model/role.php');
include_once ('model/user.php');
include_once ('model/coach.php');
include_once ('model/customer.php');
include_once ('model/coachcustomer.php');
include_once ('model/bodytarget.php');
include_once ('model/tempo.php');
include_once ('model/recovery.php');
include_once ('model/repetition.php');
include_once ('model/serie.php');
include_once ('model/exercice.php');
include_once ('model/program.php');
include_once ('model/workout.php');
include_once ('model/exerciceallkeys.php');
session_start();
?>
