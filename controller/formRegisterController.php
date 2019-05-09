<?php

//Appel AJAX pour le mail.
if (isset($_POST['mailTest'])) {
    include '../config.php';
    include_once '../model/database.php';
    include_once '../model/user.php';
    $user = new user();
    $user->mail = htmlspecialchars($_POST['mailTest']);
    echo $user->checkFreeMail();
} else { //Validation du formulaire
    

//instance $gender objet de la classe gender
    $genderInstance = new gender();
//Appel de la méthode qui permet d'afficher la liste des gender dans le select
    $genderList = $genderInstance->selectGender();

//instance $role objet de la classe role
    $roleInstance = new role();
//appel de la méthode qui permet d'afficher la liste des role dans le select
    $roleList = $roleInstance->selectRole();

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

        //verification si le post gender  existe et est différent de vide 
        if (!empty($_POST['gender']) && $_POST['gender'] != 0) {
            //si oui je créer la variable $gender avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $gender = htmlspecialchars((string) $_POST['gender']);
        } else {
            //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['gender'] = "Le genre ne peut être vide";
        }

        //vérification si le POST mailRegister existe et est différent de vide
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
        //verification si le post role  existe et est différent de vide 
        if (!empty($_POST['role']) && $_POST['role'] != 0) {
            //si oui je créer la variable $role avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $role = htmlspecialchars((string) $_POST['role']);
        } else {
            //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['role'] = "Votre type d'utilisateur ne peut être vide";
        }
//Si aucune erreur dans mon tableau d'erreur alors j'instencie mon objet user. 
//newUser devient une instance de la classe patients.
//la methode magique construct est appelée automatiquement 
//grace au mot clé new.
        if (empty($errors)) {
            $newUserInstance = new user;
            $newUserInstance->firstName = $firstName;
            $newUserInstance->lastName = $lastName;
            $newUserInstance->birthDate = $birthDate;
            $newUserInstance->gender = $gender;
            $newUserInstance->mail = $mail;
            $newUserInstance->password = $password;
            $newUserInstance->role = $role;
            $newUserInstance->addUser();
            header('location:formLogin.php');
            exit();
        }
    }
}
?>
