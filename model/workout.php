<?php

/* On crée une class workout qui hérite de la classe database via extends
 * La classe workout va nous permettre d'accéder à la table workout
 */

class workout extends database {

    public $id = 0;
    public $name = '';

    // on crée une methode magique __construct()
    function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * Méthode qui insert le nom du workout en base de données
     * @return type
     */
    public function addWorkoutName() {
        //utilisation de marqueur nomninatif car nous avons des inconnus
        $query = 'INSERT INTO `dex_workout` (`name`, `id_dex_program`)'
                . 'VALUES(:name, :id_dex_program)';
        //inconnu = requete préparée
        $addWorkout = $this->db->prepare($query);
        //bindeValue permet d'associer une valeur au marqueur nominatif
        $addWorkout->bindValue(':name', $this->name, PDO::PARAM_STR);
        $addWorkout->bindValue(':id_dex_program', $this->id_dex_program, PDO::PARAM_INT);
        //on execute la requete avec la fonction execute()
        $addWorkout->execute();
        //si ok nous récupérons le dernier id de l'insertion en base de données avec la fonction lastInsertId
        if ($addWorkout) {
            $this->lastInsertId = $this->db->lastInsertId('id');
        }
        return $addWorkout;
    }

    /**
     * Méthide pour mettre a jour le nom du workout en fonction de l'id du program
     * @return type
     */
    public function updateWorkoutName() {
        $query = 'UPDATE `dex_workout` SET `name` =:name WHERE `id_dex_program` =:id_dex_program';
        $updateWorkout = $this->db->prepare($query);
        $updateWorkout->bindValue(':name', $this->name, PDO::PARAM_STR);
        $updateWorkout->bindValue(':id_dex_program', $this->id_dex_program, PDO::PARAM_INT);
        return $updateWorkout->execute();
    }

    /**
     * méthode qui affiche la liste des workout 
     * @return type
     */
    public function selectWorkout() {
        $result = array();
        $query = 'SELECT `id`,`name`, `id_dex_program` FROM `dex_workout';
        $queryResult = $this->db->query($query);
        if (is_object($queryResult)) {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}

?>