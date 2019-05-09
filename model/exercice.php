<?php

class exercice extends database {

    public $id = 0;
    public $type = '';
    public $id_dex_bodytarget = 0;

    function __construct() {
	parent::__construct();
    }

    /**
     * méthode qui affiche les exercices
     * @return type
     */
    public function selectExercice() {
	$result = array();
	$query = 'SELECT * FROM `dex_exercice` WHERE `id_dex_bodytarget` = :id_dex_bodytarget';
	$queryResult = $this->db->prepare($query);
	$queryResult->bindValue(':id_dex_bodytarget', $this->id_dex_bodytarget, PDO::PARAM_INT);
	$queryResult->execute();
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



