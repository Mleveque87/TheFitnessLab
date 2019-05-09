<?php
$coachCustomerInstance = new coachCustomer();
$coachCustomerInstance->id_dex_user_customer = $_SESSION['idUser'];
$coachInfo = $coachCustomerInstance->coachInfoCustomer();

if($coachInfo){
$programInstance = new program();
$programInstance->id_dex_user = $coachInfo->idCoach;
$programInstance->id_dex_user_customer = $_SESSION['idUser'];
$programInstanceList = $programInstance->viewProgramCustomer();
}



?>
