<?php
$userInstance = new user();
$userInstance->mail = $_SESSION['mailLogin'];
$userInfo= $userInstance->getUserInfo();

$customerInstance = new customer();
$customerInstance->id = $_SESSION['idUser'];
$customerInstance->getCustomerInfo();

if(isset ($_GET['idUserCoach'])){
    $coachClientInstance = new coachCustomer();
    $coachClientInstance->id_dex_user = htmlspecialchars($_GET['idUserCoach']);
    $coachClientInstance->id_dex_user_customer = $_SESSION['idUser'];
    $coachClientInstance->addCoachCustomer();
}
?>
