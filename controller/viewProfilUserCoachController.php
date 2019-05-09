<?php
$userInstance = new user();
$userInstance->id = htmlspecialchars($_GET['id']);
$userInfo = $userInstance->getUserInfoViewCoach();

$customerInstance = new customer();
$customerInstance->id = htmlspecialchars($_GET['id']);
$customerInstance->getCustomerInfo();

?>