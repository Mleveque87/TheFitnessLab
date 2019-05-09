<?php

//instance $user objet de la classe user
$user = new user();
$mail = '';
$password = '';

/**
 * 
 * @global type $errors
 * @param type $key
 * @return type
 */
function showError($key) {
    global $errors; //Récupère la variable $errors dans la portée globale
    return !empty($errors[$key]) ? '<div class="bg-danger">' . $errors[$key] . '</div>' : '';
}

if (isset($_POST['submitLogin'])) {
    if (!empty($_POST['mailLogin'])) {
        if (filter_var($_POST['mailLogin'], FILTER_VALIDATE_EMAIL)) {
            $mail = htmlspecialchars($_POST['mailLogin']);
        } else {
            $errors['mailLogin'] = 'Le courriel n\'est pas valide';
        }
    } else {
        $errors['mailLogin'] = 'Veuillez renseigner un courriel';
    }
    if (!empty($_POST['passwordLogin'])) {
        $password = $_POST['passwordLogin'];
    } else {
        $errors['passwordLogin'] = 'Veuillez renseigner un mot de passe';
    }

//    Si pas d'erreur dans le tableau $errors je verifie la correspondance du hash du password. Si ok, j'attribue les valeurs à mes variables de session.
    if (empty($errors)) {
        $user->mail = $mail;
        $hash = $user->getHashFromUser();
        if (is_object($hash)) {
            $isConnect = password_verify($password, $hash->password);
            //l'utilisateur est connecté
            if ($isConnect) {
                $userInfo = $user->getUserInfo();
                $_SESSION['mailLogin'] = $user->mail;
                $_SESSION['firstName'] = $userInfo->firstname;
                $_SESSION['role'] = $userInfo->id_dex_role;
                $_SESSION['idUser'] = $userInfo->id;
                $_SESSION['checkinfo'] = $userInfo->checkinfo;
                $_SESSION['lastName'] = $userInfo->lastname;
                $_SESSION['isConnect'] = true;
                //en fonction du role j'aiguille l'utilisateur sur la bonne page
                if (($_SESSION['role']) == 2) {
                    if ($_SESSION['checkinfo'] == 0)
                        header('location:formProfilCoach.php');
                    else
                        header('location:profilCoach.php');
                } else if (($_SESSION['role']) == 3) {
                    if ($_SESSION['checkinfo'] == 0)
                        header('location:formProfilCustomer.php');
                    else
                        header('location:profilCustomer.php');
                } else if (($_SESSION['role']) == 1) {
                    header('location:adminPage.php');
                }
                exit();
            }
        }
    }
}
?>