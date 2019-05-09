<?php

/* On crée une class program qui hérite de la classe database via extends
 * La classe program va nous permettre d'accéder à la table program
 */

class program extends database {

    public $firstname = '';
    public $lastname = '';
    public $birthdate = '0000-00-00';
    public $mail = '';
    public $avatar = '';
    public $nameProgram = '';
    public $nameWorkout = '';
    public $typeTempo = 0;
    public $numberRepetition = 0;
    public $timeRecovery = 0;
    public $numberSerie = 0;
    public $typeExercice = '';
    public $nameBodytarget = '';

    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * méthode qui affiche la liste des programmes en cours par l'id coach
     * @return type
     */
    public function listProgramByCoach() {
        $result = array();
        $query = 'SELECT `dex_user`.`firstname`,
                    `dex_user`.`lastname`,
                    `dex_user`.`id` AS idCustomer,
                    `dex_customerinfo`.`goal`,
                    `dex_coachcustomer`.`id_dex_user`,
                    `dex_coachcustomer`.`id_dex_program`,
                    `dex_coachcustomer`.`id_dex_user_customer`,
                    `dex_program`.`id`,
                    `dex_program`.`name`
                    FROM `dex_user`
                    INNER JOIN `dex_customerinfo`
                    ON `dex_customerinfo`.`id_dex_user` = `dex_user`.`id`
                    INNER JOIN `dex_coachcustomer`
                    ON `dex_coachcustomer`.`id_dex_user_customer` = `dex_user`.`id`
                    INNER JOIN `dex_program`
                    ON `dex_program`.`id` = `dex_coachcustomer`.`id_dex_program`
                    WHERE `dex_coachcustomer`.`id_dex_user` =:id_dex_user';
        $listProgram = $this->db->prepare($query);
        $listProgram->bindValue(':id_dex_user', $this->id_dex_user, PDO::PARAM_INT);
        if ($listProgram->execute()) {
            $result = $listProgram->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * Méthode pour ajouter le nom du programme
     * @return type
     */
    public function addProgramName() {
        $query = 'INSERT INTO `dex_program` (`name`)'
                . 'VALUES (:name)';
        $result = $this->db->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->execute();
        if ($result) {
            $this->lastInsertId = $this->db->lastInsertId('id');
        }
        return $result;
    }
    
    /**
     * Méthode pour mettre a jour le nom du programme en fonction de son id
     * @return type
     */
    public function updateProgramName(){
        $query = 'UPDATE `dex_program` SET `name` =:name WHERE `id` =:id';
        $updateProgram = $this->db->prepare($query);
        $updateProgram->bindValue(':name', $this->name, PDO::PARAM_STR);
        $updateProgram->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $updateProgram->execute();
    }

    /**
     * méthode qui affiche le program pour le client
     * @return type
     */
    public function viewProgramCustomer() {
        $return = array();
        $query = 'SELECT `dex_user`.`id` AS IdCustomer,
                    `dex_user`.`firstname`,
                    `dex_user`.`lastname`,
                    `dex_customerinfo`.`goal`,
                    `dex_program`.`id` AS idProgram,
                    `dex_program`.`name` AS nameProgram,
                    `dex_exerciceallkeys`.`id` AS idKeys,
                    `dex_workout`.`id` AS idWorkout,
                    `dex_workout`.`name` AS nameWorkout,
                    `dex_tempo`.`id` AS idTempo,
                    `dex_tempo`.`type` AS typeTempo,
                    `dex_repetition`.`id` AS idRepetition,
                    `dex_repetition`.`number` AS numberRepetition,
                    `dex_recovery`.`id` AS idRecovery,
                    `dex_recovery`.`time` AS timeRecovery,
                    `dex_serie`.`number` AS numberSerie,
                    `dex_serie`.`id` AS idSerie,
                    `dex_exercice`.`id` AS idExercice,
                    `dex_exercice`.`type` AS typeExercice
                    FROM `dex_user`   
                    INNER JOIN `dex_customerinfo`
                    ON `dex_customerinfo`.`id_dex_user` = `dex_user`.`id`
                    INNER JOIN `dex_coachcustomer`
                    ON `dex_coachcustomer`.`id_dex_user_customer` = `dex_user`.`id`
                    INNER JOIN `dex_program`
                    ON `dex_program`.`id` = `dex_coachcustomer`.`id_dex_program`
                    INNER JOIN `dex_workout`
                    ON `dex_workout`.`id_dex_program` = `dex_program`.`id`
                    INNER JOIN `dex_exerciceallkeys`
                    ON `dex_exerciceallkeys`.`id_dex_workout` = `dex_workout`.`id`
                    INNER JOIN `dex_tempo`
                    ON `dex_tempo`.`id` = `dex_exerciceallkeys`.`id_dex_tempo`
                    INNER JOIN `dex_recovery`
                    ON `dex_recovery`.`id` = `dex_exerciceallkeys`.`id_dex_recovery`
                    INNER JOIN `dex_serie`
                    ON `dex_serie`.`id` = `dex_exerciceallkeys`.`id_dex_serie`
                    INNER JOIN `dex_repetition`
                    ON `dex_repetition`.`id` = `dex_exerciceallkeys`.`id_dex_repetition`
                    INNER JOIN `dex_exercice`
                    ON `dex_exercice`.`id` = `dex_exerciceallkeys`.`id_dex_exercice`
                    WHERE `dex_coachcustomer`.`id_dex_user` = :id_dex_user
                    AND `dex_coachcustomer`.`id_dex_user_customer` = :id_dex_user_customer
                    ORDER BY `dex_exerciceallkeys`.`id` ASC';
        $result = $this->db->prepare($query);
        $result->bindValue(':id_dex_user', $this->id_dex_user, PDO::PARAM_INT);
        $result->bindValue(':id_dex_user_customer', $this->id_dex_user_customer, PDO::PARAM_INT);
        if ($result->execute()) {
            $return = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $return;
    }

    /**
     * Méthode qui affiche le program pour le coach
     * @return type
     */
    public function viewProgramCoach() {
        $return = array();
        $query = 'SELECT `dex_user`.`id` AS IdCoach,
                    `dex_user`.`firstname`,
                    `dex_user`.`lastname`,
                    `dex_program`.`id` AS idProgram,
                    `dex_program`.`name` AS nameProgram,
                    `dex_exerciceallkeys`.`id` AS idKeys,
                    `dex_workout`.`id` AS idWorkout,
                    `dex_workout`.`name` AS nameWorkout,
                    `dex_tempo`.`id` AS idTempo,
                    `dex_tempo`.`type` AS typeTempo,
                    `dex_repetition`.`id` AS idRepetition,
                    `dex_repetition`.`number` AS numberRepetition,
                    `dex_recovery`.`id` AS idRecovery,
                    `dex_recovery`.`time` AS timeRecovery,
                    `dex_serie`.`number` AS numberSerie,
                    `dex_serie`.`id` AS idSerie,
                    `dex_exercice`.`id` AS idExercice,
                    `dex_exercice`.`type` AS typeExercice,
                    `dex_bodytarget`.`id` AS idBodytarget,
                    `dex_bodytarget`.`name` AS nameBodytarget,
                    `dex_exerciceallkeys`.`id` AS idExerciceAllKeys
                    FROM `dex_user`   
                    INNER JOIN `dex_coachcustomer`
                    ON `dex_coachcustomer`.`id_dex_user` = `dex_user`.`id`
                    INNER JOIN `dex_program`
                    ON `dex_program`.`id` = `dex_coachcustomer`.`id_dex_program`
                    INNER JOIN `dex_workout`
                    ON `dex_workout`.`id_dex_program` = `dex_program`.`id`
                    INNER JOIN `dex_exerciceallkeys`
                    ON `dex_exerciceallkeys`.`id_dex_workout` = `dex_workout`.`id`
                    INNER JOIN `dex_tempo`
                    ON `dex_tempo`.`id` = `dex_exerciceallkeys`.`id_dex_tempo`
                    INNER JOIN `dex_recovery`
                    ON `dex_recovery`.`id` = `dex_exerciceallkeys`.`id_dex_recovery`
                    INNER JOIN `dex_serie`
                    ON `dex_serie`.`id` = `dex_exerciceallkeys`.`id_dex_serie`
                    INNER JOIN `dex_repetition`
                    ON `dex_repetition`.`id` = `dex_exerciceallkeys`.`id_dex_repetition`
                    INNER JOIN `dex_exercice`
                    ON `dex_exercice`.`id` = `dex_exerciceallkeys`.`id_dex_exercice`
                    INNER JOIN `dex_bodytarget`
                    ON `dex_bodytarget`.`id` = `dex_exercice`.`id_dex_bodytarget`
                    WHERE `dex_coachcustomer`.`id_dex_user` = :id_dex_user
                    AND `dex_coachcustomer`.`id_dex_user_customer` = :id_dex_user_customer
                    ORDER BY `dex_exerciceallkeys`.`id` ASC';
        $result = $this->db->prepare($query);
        $result->bindValue(':id_dex_user', $this->id_dex_user, PDO::PARAM_INT);
        $result->bindValue(':id_dex_user_customer', $this->id_dex_user_customer, PDO::PARAM_INT);
        if ($result->execute()) {
            $return = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $return;
    }

    /**
     * Méthode pour supprimer un program
     * @return type
     */
    public function deleteProgram() {
        $query = 'DELETE FROM `dex_program` WHERE `dex_program`.`id` = :id';
        $deleteProgram = $this->db->prepare($query);
        $deleteProgram->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteProgram->execute();
    }

    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}

?>