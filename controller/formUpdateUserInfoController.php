<?php

$user = new user();
$user->mail = $_SESSION['mailLogin'];
$userInfo = $user->getUserInfo();

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

//Si je click sur valider et récupére le post submitRegister j'instancie mes variables REGEX et effectue les vérifications des POST récupérer dans le form.
if (isset($_POST['submitRegister'])) {
    // création des variables REGEX
    $regexText = '/^[0-9A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ°\s\'\-]{3,100}$/';
    $birthDateRegex = "/[0-9]{4}-[0-9]{2}-[0-9]{2}/";

    //verification si le POST firstName existe et est différent de vide
    if (!empty($_POST['firstName'])) {
        //vérification du post firstName avec la regex
        if (preg_match($regexText, $_POST['firstName'])) {
            //si oui je crée la variable $firstName avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $firstName = htmlspecialchars((string) $_POST['firstName']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['firstName'] = "Le prénom ne doit contenir que des lettres majuscule et minuscule entre 3 et 30 caractères";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['firstName'] = "Le prénom ne peut être vide";
    }

    //vérification si le POST lastName existe et est différent de vide
    if (!empty($_POST['lastName'])) {
        //vérification du post lastName avec la regex
        if (preg_match($regexText, $_POST['lastName'])) {
            //si oui je crée la variable $lastName avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $lastName = htmlspecialchars((string) $_POST['lastName']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['lastName'] = "Le nom ne doit contenir que des lettres majuscule et minuscule entre 3 et 30 caractères";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['lastName'] = "Le nom ne peut être vide";
    }

    //verification si le post birthDate  existe et est différent de vide 
    if (!empty($_POST['birthDate'])) {
        //vérification du post birthDate avec la regex
        if (preg_match($birthDateRegex, $_POST['birthDate'])) {
            //si oui je créer la variable $birthDate avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $birthDate = htmlspecialchars((string) $_POST['birthDate']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['birthDate'] = "La date de naissance doit être au format dd/mm/yy";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['birthDate'] = "La date de naissance ne peut être vide";
    }
    if (!empty($_POST['mailRegister']) && !empty($_POST['mailRegisterConfirm'])) {
        //Emploi de la fonction PHP Filter_var pour valider l'adresse Email.
        if (FILTER_VAR($_POST['mailRegister'], FILTER_VALIDATE_EMAIL)) {
            //si oui je crée la variable $mail avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $mailTemp = htmlspecialchars((string) $_POST['mailRegister']);
            //je vérifie que la confirmation du mail correspond bien
            if ($mailTemp == $_POST['mailRegisterConfirm']) {
                $mail = htmlspecialchars((string) $_POST['mailRegister']);
            } else {
                $errors['mailRegister'] = 'Les deux adresses mail ne sont pas identiques.';
            }
        } else {
            $errors['mailRegister'] = 'Votre mail est  invalide.';
        }
    } else {
        $errors['mailRegisterConfirm'] = 'Erreur,merci de remplir les deux adresses mail.';
        $errors['mailRegister'] = 'Erreur,merci de remplir les deux adresses mail.';
    }

    //vérification si le POST passwordRegister existe et est différent de vide ainsi que le POST passwordRegisterConfirm
    if (!empty($_POST['passwordRegister']) && !empty($_POST['passwordConfirmRegister'])) {
        //si oui je crée la variable $passwordRegister
        $password = ($_POST['passwordRegister']);
        if ($password == $_POST['passwordConfirmRegister']) {
            $password = password_hash($password, PASSWORD_BCRYPT);
        } else {
            $errors['passwordConfirmRegister'] = 'Les deux mots de passe ne sont pas identiques.';
        }
    } else {
        $errors['passwordRegister'] = 'Erreur,merci de remplir les deux mots de passe.';
        $errors['passwordConfirmRegister'] = 'Erreur,merci de remplir les deux mots de passe.';
    }

    if (empty($errors)) {
        $user = new user();
        $user->id = $_SESSION['idUser'];
        $user->firstname = $firstName;
        $user->lastname = $lastName;
        $user->birthdate = $birthDate;
        $user->mail = $mail;
        $user->password = $password;
        $user = $user->updateUserInfo();
        if ($_SESSION['role'] == 2) {
        header ('location:profilCoach.php');
        } else if ($_SESSION['role'] == 3) {
            header ('location:profilCustomer.php');
        }
    }
}
?>