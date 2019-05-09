<?php
$user = new user ();
$isDelete = false;
$user->id = $_SESSION['idUser'];
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'deleteUser') {
        $user->deleteUser();
        $isDelete = true;
        header('Location:index.php');
        exit();
    }
}
