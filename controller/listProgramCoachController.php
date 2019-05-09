<?php

$programInstance = new program();
$programInstance->id_dex_user = $_SESSION['idUser'];
$programList = $programInstance->listProgramByCoach();

if (isset($_GET['action'])) {
     if ($_GET['action'] == 'delete') {
     $programInstance->id = htmlspecialchars($_GET['id']);
     $programInstance->deleteProgram();
     $programList = $programInstance->listProgramByCoach();
     header('Location:listProgramCoach.php');
    exit();
     }
}
?>
