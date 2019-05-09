<?php

/* On crée une class program qui hérite de la classe database via extends
 * La classe program va nous permettre d'accéder à la table program
 */

class exerciceAllKeys extends database {

    public $id = 1;
    public $id_dex_tempo = 1;
    public $id_dex_recovery = 1;
    public $id_dex_workout = 1;
    public $id_dex_exercice = 1;
    public $id_dex_repetition = 1;
    public $id_dex_serie = 1;

    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * Méthode qui ajouter toute les keys pour les exercices
     * @return type
     */
    public function addExerciceAllkeys() {
        $query = 'INSERT INTO `dex_exerciceallkeys` (`id_dex_tempo`, `id_dex_recovery`, `id_dex_workout`, `id_dex_exercice`, `id_dex_repetition`, `id_dex_serie`) '
                . 'VALUES (:id_dex_tempo, :id_dex_recovery, :id_dex_workout, :id_dex_exercice, :id_dex_repetition, :id_dex_serie)';
        $addExercice = $this->db->prepare($query);
        $addExercice->bindValue(':id_dex_tempo', $this->id_dex_tempo, PDO::PARAM_INT);
        $addExercice->bindValue(':id_dex_recovery', $this->id_dex_recovery, PDO::PARAM_INT);
        $addExercice->bindValue(':id_dex_workout', $this->id_dex_workout, PDO::PARAM_INT);
        $addExercice->bindValue(':id_dex_exercice', $this->id_dex_exercice, PDO::PARAM_INT);
        $addExercice->bindValue(':id_dex_repetition', $this->id_dex_repetition, PDO::PARAM_INT);
        $addExercice->bindValue(':id_dex_serie', $this->id_dex_serie, PDO::PARAM_INT);
        $addExercice->execute();
        return $addExercice;
    }

    /**
     * Méthode pour mettre a jour les exercices d'un workout en fonction de l'id de workout
     * @return type
     */
    public function updateExerciceAllkeys() {
        $query = 'UPDATE `dex_exerciceallkeys` SET `id_dex_tempo` =:id_dex_tempo, `id_dex_recovery` =:id_dex_recovery, `id_dex_exercice` =:id_dex_exercice, `id_dex_repetition` =:id_dex_repetition, `id_dex_serie` =:id_dex_serie WHERE `id` =:id';
        $updateExercice = $this->db->prepare($query);
        $updateExercice->bindValue(':id_dex_tempo', $this->id_dex_tempo, PDO::PARAM_INT);
        $updateExercice->bindValue(':id_dex_recovery', $this->id_dex_recovery, PDO::PARAM_INT);
        $updateExercice->bindValue(':id_dex_exercice', $this->id_dex_exercice, PDO::PARAM_INT);
        $updateExercice->bindValue(':id_dex_repetition', $this->id_dex_repetition, PDO::PARAM_INT);
        $updateExercice->bindValue(':id_dex_serie', $this->id_dex_serie, PDO::PARAM_INT);
        $updateExercice->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $updateExercice->execute();
    }

    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}
