<?php

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

//Si je click sur valider et récupére le post submit j'instancie mes variables REGEX et effectue les vérifications des POST récupérer dans le form.
if (isset($_POST['submitProfilClient'])) {
    // création des variables REGEX
    $meteringRegex = '/[0-9]{2,3}/';
    $textRegex = '/^[0-9A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ.,° \s\'\-]{3,5000}$/';
    $sportActivityRegex = '/[0-9]{1,2}/';

    //verification si le POST clientGoal existe et est différent de vide
    if (!empty($_POST['clientGoal'])) {
        //vérification du post clientGoal avec la regex
        if (preg_match($textRegex, $_POST['clientGoal'])) {
            //si oui je crée la variable $clientGoal avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $clientGoal = htmlspecialchars((string) $_POST['clientGoal']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['clientGoal'] = "La description de vos objectis ne doit contenir que des chiffres et des lettres";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['clientGoal'] = "Vos objectifs ne peuvent être vides";
    }

    //verification si le POST sportActivity existe et est différent de vide
    if (!empty($_POST['sportActivity'])) {
        //vérification du post sportActivity avec la regex
        if (preg_match($sportActivityRegex, $_POST['sportActivity'])) {
            //si oui je crée la variable $sportActivity avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $sportActivity = htmlspecialchars((int) $_POST['sportActivity']);
        } else {
            //si pas de correspondance avecl a regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['sportActivity'] = "Votre activité sportive hebdomadaire ne doit contenir que des chiffres";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['sportActivity'] = "Votre activité sportive hebdomadaire ne peux être vide";
    }

    //verification si le POST weightInit existe et est différent de vide
    if (!empty($_POST['weightInit'])) {
        //vérification du post weightInit avec la regex
        if (preg_match($meteringRegex, $_POST['weightInit'])) {
            //si oui je crée la variable $sportActivity avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $weightInit = htmlspecialchars((int) $_POST['weightInit']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['weightInit'] = "Votre poid ne doit contenir que des chiffres";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['weightInit'] = "Votre poid ne peux être vide";
    }

    //verification si le POST meteringBicepsInit existe et est différent de vide
    if (!empty($_POST['meteringBicepsInit'])) {
        //vérification du post meteringBicepsInit avec la regex
        if (preg_match($meteringRegex, $_POST['meteringBicepsInit'])) {
            //si oui je crée la variable $meteringBicepsInit avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $meteringBicepsInit = htmlspecialchars((int) $_POST['meteringBicepsInit']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['meteringBicepsInit'] = "La mesure de votre biceps ne doit contenir que des chiffres";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['meteringBicepsInit'] = "La mesure de votre biceps ne peux être vide";
    }

    //verification si le POST meteringChestInit existe et est différent de vide
    if (!empty($_POST['meteringChestInit'])) {
        //vérification du post meteringBicepsInit avec la regex
        if (preg_match($meteringRegex, $_POST['meteringChestInit'])) {
            //si oui je crée la variable $meteringChestInit avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $meteringChestInit = htmlspecialchars((int) $_POST['meteringChestInit']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['meteringChestInit'] = "La mesure de votre torse ne doit contenir que des chiffres";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['meteringChestInit'] = "La mesure de votre torse ne peux être vide";
    }

    //verification si le POST meteringWaistLineInit existe et est différent de vide
    if (!empty($_POST['meteringWaistLineInit'])) {
        //vérification du post meteringWaistLineInit avec la regex
        if (preg_match($meteringRegex, $_POST['meteringWaistLineInit'])) {
            //si oui je crée la variable $meteringChestInit avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $meteringWaistLineInit = htmlspecialchars((int) $_POST['meteringWaistLineInit']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['meteringWaistLineInit'] = "La mesure de votre taille ne doit contenir que des chiffres";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['meteringWaistLineInit'] = "La mesure de votre taile ne peux être vide";
    }

    //verification si le POST meteringLegInit existe et est différent de vide
    if (!empty($_POST['meteringLegInit'])) {
        //vérification du post meteringLegInit avec la regex
        if (preg_match($meteringRegex, $_POST['meteringLegInit'])) {
            //si oui je crée la variable meteringLegInit avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $meteringLegInit = htmlspecialchars((int) $_POST['meteringLegInit']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['meteringLegInit'] = "La mesure de votre cuisse ne doit contenir que des chiffres";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['meteringLegInit'] = "La mesure de votre cuisse ne peux être vide";
    }

    if (isset($_FILES['pictureFront']) && !empty($_FILES['pictureFront']['name'])) {
        // On gère ici la taille en Octets le poids de notre image
        // ici donc environ 5Mo
        $tailleMax = 5097152;
        // on declare un tableau pour les extensions autorisées
        $extensionsValides = ['jpg', 'jpeg', 'gif', 'png'];
        // on récupère et on compare le poids de l'image avec ce que l'on autorise  
        if ($_FILES['pictureFront']['size'] <= $tailleMax) {
            // on récupere ici l'extension de notre image passée 
            // strtolower ==> passe tous les caractères en minuscules
            // substr ==> on enlève le nom de notre image 
            // strrchr ==> on récupère la dernière occurence de notre fichier après le point exemple ==> png 
            $extensionUpload = strtolower(substr(strrchr($_FILES['pictureFront']['name'], '.'), 1));
            // on compare avec notre tableau d'extensions autorisées si c'est bon on continu
            if (in_array($extensionUpload, $extensionsValides)) {
                // Pour éviter d'avoir un doublon de fichier dans notre dossier sur le nom
                // on va ici utiliser uniqid() qui va générer un code aléatoire à notre image
                // **********************************************************//
                // On déclare une variable $nameTraitement qui sera par défaut un tableau vide
                $nameTraitement = [];
                // on explose notre nom de fichier par le point
                //  ( exemple : monimage.png sera explosé de la sorte
                // [0] => monimage
                // [1] => png )
                // pour récupérer seulement le nom de notre fichier qui sera appelé
                // $nameTraitement[0] 
                // par précaution on enlève les espaces et on les remplaces par un tiret
                // str_replace([' ', '-']
                $nameTraitement = explode('.', str_replace([' ', '-'], '-', htmlspecialchars($_FILES['pictureFront']['name'])));
                $nameFile = uniqid($nameTraitement[0]);
                $folder = 'assets/upload/members/' . $_SESSION['idUser'];
                if (!is_dir($folder)) {
                    mkdir($folder, 0777, true);
                }
                if (is_dir($folder)) {
                    // on déclare le chemin de notre dossier qui va recevoir nos images
                    $repository = $folder . '/' . $nameFile . '.' . $extensionUpload;
                    // Comme c'est OK on envoie notre image dans notre dossier upload.
                    move_uploaded_file($_FILES['pictureFront']['tmp_name'], $repository);
                    // On renvoie un message de succes
                    $isSuccess = true;
                }
            }
            // sinon on renvoie une erreur en affichant les extensions autorisées seulement
            else {
                $errors['pictureFront'] = 'Votre photo doit être au format jpg, jpeg, gif ou png.';
            }
            // sinon on renvoie une erreur en affichant le poid de l'image MAX autorisée
        } else {
            $errors['pictureFront'] = 'Votre photo ne doit pas dépasser 5Mo.';
        }
    }

    if (empty($errors)) {
        $newCustomerInstance = new customer();
        $newCustomerInstance->id_dex_User = $_SESSION['idUser'];
        $newCustomerInstance->weight = $weightInit;
        $newCustomerInstance->goal = $clientGoal;
        $newCustomerInstance->sportActivity = $sportActivity;
        $newCustomerInstance->meteringBiceps = $meteringBicepsInit;
        $newCustomerInstance->meteringChest = $meteringChestInit;
        $newCustomerInstance->meteringWaistline = $meteringWaistLineInit;
        $newCustomerInstance->meteringLeg = $meteringLegInit;
        $newCustomerInstance->pictureFront = $nameFile;
        $newCustomerInstance->checkinfo = 1;
        $newCustomerInstance->addCustomerInfo();
        $newCustomerInstance->id = $_SESSION['idUser'];
        $newCustomerInstance->checkInfo();
        header('location:profilCustomer.php');
    }
}
?>