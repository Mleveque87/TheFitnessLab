<?php

class repetition extends database {

    public $id = 0;
    public $time = '';

    function __construct() {
        parent::__construct();
    }

    /**
     * méthode qui affiche les répétitions
     * @return type
     */
    public function selectRepetition() {
        $result = array();
        $query = 'SELECT `id`,`number` FROM `dex_repetition`;';
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