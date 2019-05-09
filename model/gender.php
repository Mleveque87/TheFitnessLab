<?php

class gender extends database {

    public $id = 0;
    public $type = '';

    function __construct() {
        parent::__construct();
    }

    /**
     * méthode qui affcihe les genres
     * @return type
     */
    public function selectGender() {
        $result = array();
        $query = 'SELECT `id`,`type` FROM `dex_gender`';
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