<?php

/* On crée une class bodyTarget qui hérite de la classe database via extends
 * La classe bodyTarget va nous permettre d'accéder à la table bodyTarget
 */

class bodyTarget extends database {

    public $id = 0;
    public $name = '';

    // on crée une methode magique __construct()
    function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * méthode qui affiche les bodyTarget pour le menu déroulant
     * @return type
     */
    public function selectbodyTarget() {
        //déclaration d'un tableau vide afin d'éviter l'affichage d'erreur en cas de probleme.
        $result = array();
        $query = 'SELECT `id`,`name` FROM `dex_bodytarget`';
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