<?php

if (isset($_POST['idBody'])) { //Appel AJAX 
    include_once ('../config.php');
    include_once ('../model/database.php');
    include_once ('../model/exercice.php');
    //Instance du modèle exercice
    $exerciceInstance = new exercice();
    //on donne à id_dex_bodytarget du modèle exercice le post récupérer par ajax idbody
    $exerciceInstance->id_dex_bodytarget = htmlspecialchars($_POST['idBody']);
    //on execute notre méthode du menu déroulant exercice
    $exercices = $exerciceInstance->selectExercice();
    echo json_encode($exercices);
} else {
    $bodytargetInstance = new bodytarget();
    $bodytarget = $bodytargetInstance->selectbodyTarget();
}

//instance de coachCustomer et de la méthode listCustomer coach afin de récupérer la liste des clients associer au coach grâce à l'id de session du coach
$coachCustomerInstance = new coachCustomer();
$coachCustomerInstance->id_dex_user = $_SESSION['idUser'];
$coachCustomerList = $coachCustomerInstance->listCustomerCoach();

//instance du modèle tempo  et de la méthode selecttempo pour le menu déroulant
$tempoInstance = new tempo();
$tempos = $tempoInstance->selectTempo();

//instance du modèle recovery  et de la méthode selectRecovery pour le menu déroulant
$recoveryInstance = new recovery();
$recoverys = $recoveryInstance->selectRecovery();

//instance du modèle repetition  et de la méthode selectRepetition pour le menu déroulant
$repetInstance = new repetition();
$repets = $repetInstance->selectRepetition();

//instance du modèle serie  et de la méthode selectSerie pour le menu déroulant
$serieInstance = new serie();
$series = $serieInstance->selectSerie();

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

if (isset($_POST['submitProgram'])) {
    // création des variables REGEX
    $programNameRegex = '/^[\w\- ]{3,100}$/';
    $workoutNameRegex = '/^[\w\- ]{3,100}$/';

    //verification si le POST programName existe et est différent de vide
    if (!empty($_POST['programName'])) {
        //vérification du post programName avec la regex
        if (preg_match($programNameRegex, $_POST['programName'])) {
            //si oui je crée la variable $programName avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $programName = htmlspecialchars((string) $_POST['programName']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['programName'] = "Le nom de programme ne doit contenir que des lettres majuscule et minuscule entre 3 et 100 caractères";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['programName'] = "Le nom de programme ne peut être vide";
    }

    //verification si le post customer  existe et est différent de vide 
    if (!empty($_POST['customer']) && $_POST['customer'] != 0) {
        //si oui je créer la variable $customer avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $customer = htmlspecialchars((string) $_POST['customer']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['customer'] = "Le choix de votre client ne peut être vide";
    }

    //verification si le POST workoutName existe et est différent de vide
    if (!empty($_POST['workoutName1'])) {
        //vérification du post programName avec la regex
        if (preg_match($workoutNameRegex, $_POST['workoutName1'])) {
            //si oui je crée la variable $workoutName avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
            $workoutName1 = htmlspecialchars((string) $_POST['workoutName1']);
        } else {
            //si pas de correspondance avecla regex, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
            $errors['workoutName1'] = "Le nom de la séance ne doit contenir que des lettres majuscule et minuscule entre 3 et 100 caractères";
        }
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['workoutName1'] = "Le nom de la séance ne peut être vide";
    }

    //verification si le post targetBody  existe et est différent de vide 
    if (!empty($_POST['bodytarget']) && $_POST['bodytarget'] != 0) {
        //si oui je créer la variable $targetBody avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $bodytarget1 = htmlspecialchars((string) $_POST['bodytarget']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['bodytarget'] = "Le choix du muscle ciblé ne peut être vide";
    }

    //verification si le post exercice1  existe et est différent de vide 
    if (!empty($_POST['exercice1']) && $_POST['exercice1'] != 0) {
        //si oui je créer la variable $exercice1 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $exercice1 = htmlspecialchars((string) $_POST['exercice1']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['exercice1'] = "Le choix de l'exercice ne peut être vide";
    }

    //verification si le post tempo1  existe et est différent de vide 
    if (!empty($_POST['tempo1']) && $_POST['tempo1'] != 0) {
        //si oui je créer la variable $tempo1 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $tempo1 = htmlspecialchars((string) $_POST['tempo1']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['tempo1'] = "Le choix du tempo ne peut être vide";
    }

    //verification si le post recovery1  existe et est différent de vide 
    if (!empty($_POST['recovery1']) && $_POST['recovery1'] != 0) {
        //si oui je créer la variable $recovery1 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $recovery1 = htmlspecialchars((string) $_POST['recovery1']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['recovery1'] = "Le choix du temp de récupération ne peut être vide";
    }

    //verification si le POST repetition1 existe et est différent de vide
    if (!empty($_POST['repetition1']) && $_POST['repetition1'] != 0) {
        //si oui je crée la variable $repetition1 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $repetition1 = htmlspecialchars((int) $_POST['repetition1']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['repetition1'] = "Le nombre de répetitions ne peut être vide";
    }

    //verification si le POST serie1 existe et est différent de vide
    if (!empty($_POST['serie1']) && $_POST['serie1'] != 0) {
        //si oui je crée la variable $serie1 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $serie1 = htmlspecialchars((int) $_POST['serie1']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['serie1'] = "Le nombre de séries ne peut être vide";
    }

    //verification si le post exercice2  existe et est différent de vide 
    if (!empty($_POST['exercice2']) && $_POST['exercice2'] != 0) {
        //si oui je créer la variable $exercice2 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $exercice2 = htmlspecialchars((string) $_POST['exercice2']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['exercice2'] = "Le choix de l'exercice ne peut être vide";
    }

    //verification si le post exercice3  existe et est différent de vide 
    if (!empty($_POST['exercice3']) && $_POST['exercice3'] != 0) {
        //si oui je créer la variable $exercice3 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $exercice3 = htmlspecialchars((string) $_POST['exercice3']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['exercice3'] = "Le choix de l'exercice ne peut être vide";
    }

    //verification si le post exercice4  existe et est différent de vide 
    if (!empty($_POST['exercice4']) && $_POST['exercice4'] != 0) {
        //si oui je créer la variable $exercice4 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $exercice4 = htmlspecialchars((string) $_POST['exercice4']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['exercice4'] = "Le choix de l'exercice ne peut être vide";
    }


    //verification si le post tempo2  existe et est différent de vide 
    if (!empty($_POST['tempo2']) && $_POST['tempo2'] != 0) {
        //si oui je créer la variable $tempo2 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $tempo2 = htmlspecialchars((string) $_POST['tempo2']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['tempo2'] = "Le choix du tempo ne peut être vide";
    }

    //verification si le post tempo3  existe et est différent de vide 
    if (!empty($_POST['tempo3']) && $_POST['tempo3'] != 0) {
        //si oui je créer la variable $tempo3 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $tempo3 = htmlspecialchars((string) $_POST['tempo3']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['tempo3'] = "Le choix du tempo ne peut être vide";
    }

    //verification si le post tempo4  existe et est différent de vide 
    if (!empty($_POST['tempo4']) && $_POST['tempo4'] != 0) {
        //si oui je créer la variable $tempo4 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $tempo4 = htmlspecialchars((string) $_POST['tempo4']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['tempo4'] = "Le choix du tempo ne peut être vide";
    }


    //verification si le post recovery2  existe et est différent de vide 
    if (!empty($_POST['recovery2']) && $_POST['recovery2'] != 0) {
        //si oui je créer la variable $recovery2 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $recovery2 = htmlspecialchars((string) $_POST['recovery2']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['recovery2'] = "Le choix du temp de récupération ne peut être vide";
    }

    //verification si le post recovery3  existe et est différent de vide 
    if (!empty($_POST['recovery3']) && $_POST['recovery3'] != 0) {
        //si oui je créer la variable recovery3 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $recovery3 = htmlspecialchars((string) $_POST['recovery3']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['recovery3'] = "Le choix du temp de récupération ne peut être vide";
    }

    //verification si le post recovery4  existe et est différent de vide 
    if (!empty($_POST['recovery4']) && $_POST['recovery4'] != 0) {
        //si oui je créer la variable $recovery4 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $recovery4 = htmlspecialchars((string) $_POST['recovery4']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['recovery4'] = "Le choix du temp de récupération ne peut être vide";
    }

    //verification si le POST repetition2 existe et est différent de vide
    if (!empty($_POST['repetition2'])) {
        //si oui je crée la variable $repetition2 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $repetition2 = htmlspecialchars((int) $_POST['repetition2']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['repetition2'] = "Le nombre de répetitions ne peut être vide";
    }

    //verification si le POST repetition3 existe et est différent de vide
    if (!empty($_POST['repetition3'])) {
        //si oui je crée la variable $repetition3 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $repetition3 = htmlspecialchars((int) $_POST['repetition3']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['repetition3'] = "Le nombre de répetitions ne peut être vide";
    }

    //verification si le POST repetition4 existe et est différent de vide
    if (!empty($_POST['repetition4'])) {
        //si oui je crée la variable $repetition4 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $repetition4 = htmlspecialchars((int) $_POST['repetition4']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['repetition4'] = "Le nombre de répetitions ne peut être vide";
    }


    //verification si le POST serie2 existe et est différent de vide
    if (!empty($_POST['serie2'])) {
        //si oui je crée la variable $serie2 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $serie2 = htmlspecialchars((int) $_POST['serie2']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['serie2'] = "Le nombre de séries ne peut être vide";
    }

    //verification si le POST serie3 existe et est différent de vide
    if (!empty($_POST['serie3'])) {
        //si oui je crée la variable $serie3 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $serie3 = htmlspecialchars((int) $_POST['serie3']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['serie3'] = "Le nombre de séries ne peut être vide";
    }

    //verification si le POST serie4 existe et est différent de vide
    if (!empty($_POST['serie4'])) {
        //si oui je crée la variable serie4 avec la protection htmlspecialchars pour empecher la saisie de balises HTML ainsi que les caractères non autorisé par l'encodage
        $serie4 = htmlspecialchars((int) $_POST['serie4']);
    } else {
        //si vide, j'indique une erreur dans mon tableau d'erreurs et affiche le message correspondant
        $errors['serie4'] = "Le nombre de séries ne peut être vide";
    }

    if (empty($errors)) {
        $isOk = false;
        $newProgramInstance = new program ();
        $newProgramInstance->name = $programName;
        $newProgramInstance->addProgramName();
        $newWorkoutInstance = new workout();
        $newWorkoutInstance->name = $workoutName1;
        $newWorkoutInstance->id_dex_program = $newProgramInstance->lastInsertId;
        $newWorkoutInstance->addWorkoutName();
        $exerciceAllkeysInstance = new exerciceAllKeys();
        $exerciceAllkeysInstance->id_dex_tempo = $tempo1;
        $exerciceAllkeysInstance->id_dex_recovery = $recovery1;
        $exerciceAllkeysInstance->id_dex_workout = $newWorkoutInstance->lastInsertId;
        $exerciceAllkeysInstance->id_dex_exercice = $exercice1;
        $exerciceAllkeysInstance->id_dex_repetition = $repetition1;
        $exerciceAllkeysInstance->id_dex_serie = $serie1;
        $exerciceAllkeysInstance->addExerciceAllkeys();
        $exerciceAllkeysInstance = new exerciceAllKeys();
        $exerciceAllkeysInstance->id_dex_tempo = $tempo2;
        $exerciceAllkeysInstance->id_dex_recovery = $recovery2;
        $exerciceAllkeysInstance->id_dex_workout = $newWorkoutInstance->lastInsertId;
        $exerciceAllkeysInstance->id_dex_exercice = $exercice2;
        $exerciceAllkeysInstance->id_dex_repetition = $repetition2;
        $exerciceAllkeysInstance->id_dex_serie = $serie2;
        $exerciceAllkeysInstance->addExerciceAllkeys();
        $exerciceAllkeysInstance = new exerciceAllKeys();
        $exerciceAllkeysInstance->id_dex_tempo = $tempo3;
        $exerciceAllkeysInstance->id_dex_recovery = $recovery3;
        $exerciceAllkeysInstance->id_dex_workout = $newWorkoutInstance->lastInsertId;
        $exerciceAllkeysInstance->id_dex_exercice = $exercice3;
        $exerciceAllkeysInstance->id_dex_repetition = $repetition3;
        $exerciceAllkeysInstance->id_dex_serie = $serie3;
        $exerciceAllkeysInstance->addExerciceAllkeys();
        $exerciceAllkeysInstance = new exerciceAllKeys();
        $exerciceAllkeysInstance->id_dex_tempo = $tempo4;
        $exerciceAllkeysInstance->id_dex_recovery = $recovery4;
        $exerciceAllkeysInstance->id_dex_workout = $newWorkoutInstance->lastInsertId;
        $exerciceAllkeysInstance->id_dex_exercice = $exercice4;
        $exerciceAllkeysInstance->id_dex_repetition = $repetition4;
        $exerciceAllkeysInstance->id_dex_serie = $serie4;
        $exerciceAllkeysInstance->addExerciceAllkeys();
        $coachCustomerInstance->id_dex_program = $newProgramInstance->lastInsertId;
        $coachCustomerInstance->id_dex_user = $_SESSION['idUser'];
        $coachCustomerInstance->id_dex_user_customer = $customer;
        if ($coachCustomerInstance->addProgramCoachCustomer()) {
            $isOk = true;
            header('location:listProgramCoach');
            exit();
        }
    }
}
?>