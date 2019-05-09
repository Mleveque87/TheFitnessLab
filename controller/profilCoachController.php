<?php
$user = new user();
$user->mail = $_SESSION['mailLogin'];
$userInfo= $user->getUserInfo();

$coach = new coach();
$coach->id = $_SESSION['idUser'];
$coachInfo = $coach->getCoachInfo();
?>