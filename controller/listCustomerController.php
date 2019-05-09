<?php

$customer = new coachCustomer();
$customer->id_dex_user = $_SESSION['idUser'];
$customerList = $customer->listCustomerCoach();


if (isset($_POST['delete'])) {
    $customer->id_dex_user = htmtspecialchars($_POST['idUser']);
    $customer->id_dex_user_customer = htmtspecialchars($_POST['idUserCustomer']); 
    $customer->deleteCoachCustomerLink();
    $programInstance = new program();
    $programInstance->id = htmtspecialchars($_POST['idProgram']);
    $programInstance->deleteProgram();
    $isDelete = true;
    $customerList = $customer->listCustomerCoach();
    header('Location:listCustomer.php');
    exit();
}
?>
