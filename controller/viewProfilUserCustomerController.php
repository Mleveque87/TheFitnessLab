<?php
$userInstance = new user();
$userInstance->id = htmlspecialchars($_GET['id']);
$userInfo = $userInstance->getUserInfoViewCoach();

$coachInstance = new coach();
$coachInstance->id = htmlspecialchars($_GET['id']);
$coachInstance->getCoachInfo();



?>