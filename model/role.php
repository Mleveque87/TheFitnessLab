<?php

/* On crée une class role qui hérite de la classe database via extends
 * La classe role va nous permettre d'accéder à la table role
 */

class role extends database {

    public $id = 0;
    public $name = '';

    // on crée une methode magique __construct()
    function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * méthode qui affiche les roles dans le menus déroulant limite 1,100 afin d'empecher l'affichage du role "admin"
     * @return type
     */
    public function selectRole() {
        //déclaration d'un tableau vide afin d'éviter l'affichage d'erreur en cas de probleme.
        $result = array();
        $query = 'SELECT `id`,`name` FROM `dex_role` LIMIT 1, 100';
        //on utilise la fonction php is_object afin de déterminer si c'est bien un objet. La fonction nous retourne True ou false.
        $queryResult = $this->db->query($query);
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