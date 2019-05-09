<?php

/* On crée une class tempo qui hérite de la classe database via extends
 * La classe tempo va nous permettre d'accéder à la table tempo
 */

class tempo extends database {

    public $id = 0;
    public $type = '';

    // on crée une methode magique __construct()
    function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * méthode qui affcihe les tempos dans le menu déroulant
     * @return type
     */
    public function selectTempo() {
        //déclaration d'un tableau vide afin d'éviter l'affichage d'erreur en cas de probleme.
        $result = array();
        $query = 'SELECT `id`,`type` FROM `dex_tempo`';
        $queryResult = $this->db->query($query);
        //on utilise la fonction php is_object afin de déterminer si c'est bien un objet. La fonction nous retourne True ou false.
        if (is_object($queryResult)) {
            //si c'est bien un objet alors on utilise la fonction fetchAll qui retourne un tableau d'objet à plusieurs lignes.
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