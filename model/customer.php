<?php

/* On crée une class client qui hérite de la classe database via extends
 * La classe client va nous permettre d'accéder à la table client
 */

class customer extends database {

    public $id = 0;
    public $weight = 0;
    public $goal = '';
    public $sportActivity = 0;
    public $meteringLeg = 0;
    public $meteringWaistline = 0;
    public $meteringChest = 0;
    public $meteringBiceps = 0;
    public $pictureFront = '';
    public $id_dex_user = 0;
    public $checkinfo = 1;

    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * Méthode qui ajoute les information du client
     * @return type
     */
    function addCustomerInfo() {
        $query = 'INSERT INTO `dex_customerinfo` (`weight`, `goal`, `sportActivity`, `meteringLeg`, `meteringWaistline`, `meteringChest`, `meteringBiceps`, `pictureFront`, `id_dex_User`) '
                . 'VALUES (:weight, :goal, :sportActivity, :meteringLeg, :meteringWaistline, :meteringChest, :meteringBiceps, :pictureFront, :id_dex_User)';
        $result = $this->db->prepare($query);
        $result->bindValue(':weight', $this->weight, PDO::PARAM_INT);
        $result->bindValue(':goal', $this->goal, PDO::PARAM_STR);
        $result->bindValue(':sportActivity', $this->sportActivity, PDO::PARAM_INT);
        $result->bindValue(':meteringLeg', $this->meteringLeg, PDO::PARAM_INT);
        $result->bindValue(':meteringWaistline', $this->meteringWaistline, PDO::PARAM_INT);
        $result->bindValue(':meteringChest', $this->meteringChest, PDO::PARAM_INT);
        $result->bindValue(':meteringBiceps', $this->meteringBiceps, PDO::PARAM_INT);
        $result->bindValue(':pictureFront', $this->pictureFront, PDO::PARAM_STR);
        $result->bindValue(':id_dex_User', $this->id_dex_User, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Méthode qui passe le checkinfo de la table user a 1 si le client a remplis ses informations
     * @return type
     */
    function checkInfo() {
        $query = 'UPDATE `dex_user` SET `checkinfo` =:checkinfo WHERE id =:id';
        $result = $this->db->prepare($query);
        $result->bindValue(':checkinfo', $this->checkinfo, PDO::PARAM_INT);
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Méthode pour afficher les informations de clientInfo
     * @return boolean
     */
    function getCustomerInfo() {
        $return = FALSE;
        $isOk = FALSE;
        $query = 'SELECT weight,goal, sportActivity,meteringLeg, meteringWaistline, meteringChest, meteringBiceps, pictureFront FROM dex_customerinfo '
                . 'WHERE id_dex_user = :id';
        $selectClientInfo = $this->db->prepare($query);
        //on associe notre marqueur nominatif :id a notre attribu id grâce au $this.
        $selectClientInfo->bindValue(':id', $this->id, PDO::PARAM_INT);
        //si la requete c'est bien executé alors on rempli $returnArray avec un objet
        if ($selectClientInfo->execute()) {
            $return = $selectClientInfo->fetch(PDO::FETCH_OBJ);
        }
        //si $return est un objet alors on hydrate
        if (is_object($return)) {
            $this->weight = $return->weight;
            $this->goal = $return->goal;
            $this->sportActivity = $return->sportActivity;
            $this->meteringLeg = $return->meteringLeg;
            $this->meteringWaistline = $return->meteringWaistline;
            $this->meteringChest = $return->meteringChest;
            $this->meteringBiceps = $return->meteringBiceps;
            $this->pictureFront = $return->pictureFront;
            $isOk = TRUE;
        }
        return $isOk;
    }

    /**
     * Méthode pour afficher la liste des coachs et leurs informations
     * @return type
     */
    function listCustomer() {
        $result = array();
        $query = 'SELECT `dex_user`.`id`,'
                . '`dex_user`.`firstname`,'
                . '`dex_user`.`lastname`,'
                . 'DATE_FORMAT(`dex_user`.`birthdate`, \'%d %m %Y\') AS birthdate,'
                . '`dex_user`.`mail`,'
                . '`dex_customerinfo`.`id`,'
                . '`dex_customerinfo`.`weight`,'
                . '`dex_customerinfo`.`goal`,'
                . '`dex_customerinfo`.`sportActivity`,'
                . '`dex_customerinfo`.`meteringLeg`,'
                . '`dex_customerinfo`.`meteringWaistline`,'
                . '`dex_customerinfo`.`meteringChest`,'
                . '`dex_customerinfo`.`meteringBiceps`,'
                . '`dex_customerinfo`.`pictureFront`,'
                . '`dex_customerinfo`.`pictureprofil` '
                . 'FROM `dex_user` '
                . 'INNER JOIN `dex_customerinfo` '
                . 'ON `dex_user`.`id` = `dex_customerinfo`.`id_dex_user` '
                . 'WHERE `id_dex_role` =3';
        $listClient = $this->db->query($query);
        if (is_object($listClient)) {
            $result = $listClient->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}

?>
