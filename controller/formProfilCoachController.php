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
if (isset($_POST['submitProfilCoach'])) {
    // création des variables REGEX
    $textRegex = '/^[0-9A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ.,° \s\'\-]{3,5000}$/';
    $coachExperienceRegex = '/[0-9]{1,2}/';

    //vérification pictureBjeps
    if (isset($_FILES['pictureBjeps']) && !empty($_FILES['pictureBjeps']['name'])) {
        // On gère ici la taille en Octets le poids de notre image
        // environ 5Mo
        $tailleMax = 5097152;
        // on declare un tableau pour les extensions autorisées
        $extensionsValides = ['jpg', 'jpeg', 'gif', 'png'];
        // on récupère et on compare le poids de l'image avec ce que l'on autorise  
        if ($_FILES['pictureBjeps']['size'] <= $tailleMax) {
            // on récupere ici l'extension de notre image passée 
            // strtolower ==> passe tous les caractères en minuscules
            // substr ==> on enlève le nom de notre image 
            // strrchr ==> on récupère la dernière occurence de notre fichier après le point exemple ==> png 
            $extensionUpload = strtolower(substr(strrchr($_FILES['pictureBjeps']['name'], '.'), 1));
            // on compare avec notre tableau d'extensions autorisées
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
                $nameTraitement = explode('.', str_replace([' ', '-'], '-', htmlspecialchars($_FILES['pictureBjeps']['name'])));
                $nameFile = uniqid($nameTraitement[0]);
                $folder = 'assets/upload/members/' . $_SESSION['idUser'];
                if (!is_dir($folder)) {
                    mkdir($folder, 0777, true);
                }
                if (is_dir($folder)){
                    // on déclare le chemin de notre dossier qui va recevoir nos images
                    $repository = $folder . '/' . $nameFile . '.' . $extensionUpload;
                    // Comme c'est OK on envoie notre image dans notre dossier upload.
                    move_uploaded_file($_FILES['pictureBjeps']['tmp_name'], $repository );
                    // On renvoie un message de succes
                    $isSuccess = true;
                }
            }
            // sinon on renvoie une erreur en affichant les extensions autorisées seulement
            else {
                $errors['pictureBjeps'] = 'Votre photo doit être au format jpg, jpeg, gif ou png.';
            }
            // sinon on renvoie une erreur en affichant le poid de l'image MAX autorisée
        } else {
            $errors['pictureBjeps'] = 'Votre photo ne doit pas dépasser 5Mo.';
        }
    }
    
    //verification si le POST coachExperience existe et est différent de vide
    if (!empty($_POST['coachExperience'])) {
        //vérification du post coachExperience avec la regex
        if (preg_match($coachExperienceRegex, $_POST['coachExperience'])) {
            //si oui je crée la variable $sportActivity avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $coachExperience = htmlspecialchars((int) $_POST['coachExperience']);
        } else {
            //si pas de correspondance avecl a regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['coachExperience'] = "Vos années d'expérience ne doit contenir que des chiffres";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['coachExperience'] = "Vos années d'expérience ne peux être vide";
    }

    //verification si le POST coachBio existe et est différent de vide
    if (!empty($_POST['coachBio'])) {
        //vérification du post coachBio avec la regex
        if (preg_match($textRegex, $_POST['coachBio'])) {
            //si oui je crée la variable $coachBio avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $coachBio = htmlspecialchars((string) $_POST['coachBio']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['coachBio'] = "Votre biographie ne doit contenir que des chiffres et des lettres";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['coachBio'] = "Votre biographie ne peuvent être vides";
    }

    if (empty($errors)) {
        $newCoachInstance = new coach();
        $newCoachInstance->id_dex_user = $_SESSION['idUser'];
        $newCoachInstance->pictureBjeps = $nameFile;
        $newCoachInstance->experience = $coachExperience;
        $newCoachInstance->bio = $coachBio;
        $newCoachInstance->checkinfo = 1;
        $newCoachInstance->addCoachInfo();
        $newCoachInstance->id = $_SESSION['idUser'];
        $newCoachInstance->checkInfo();
        header('location:profilCoach.php');
    }
}
?>