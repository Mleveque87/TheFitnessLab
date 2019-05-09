<?php

$coachCustomerInstance = new coachCustomer();
$coachCustomerInstance->id_dex_user = $_SESSION['idUser'];
$customerInfo = $coachCustomerInstance->customerInfoCoach();


$programInstance = new program();
$programInstance->id_dex_user = $_SESSION['idUser'];
if (isset($_GET['id'])){
    $programInstance->id_dex_user_customer = htmlspecialchars($_GET['id']);
}else{
    $programInstance->id_dex_user_customer = $customerInfo->idCustomer;
}
$programInstanceList = $programInstance->viewProgramCoach();

