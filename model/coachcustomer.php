<?php

/* On crée une class coachClient qui hérite de la classe database via extends
 * La classe coachClient va nous permettre d'accéder à la table coachClient
 */

class coachCustomer extends database {

    public $id = 0;
    public $id_dex_user = 0;
    public $id_dex_user_customer = 0;
    public $id_dex_program = 0;

    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * Méthode pour faire l'association coach customer
     * @return type
     */
    public function addCoachCustomer() {
        $query = 'INSERT INTO `dex_coachcustomer` (`id_dex_user`,`id_dex_user_customer`) VALUES (:id_dex_user,:id_dex_user_customer)';
        $result = $this->db->prepare($query);
        $result->bindValue(':id_dex_user', $this->id_dex_user, PDO::PARAM_INT);
        $result->bindValue(':id_dex_user_customer', $this->id_dex_user_customer, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Méthode qui affiche la liste client associé au coach
     * @return type
     */
    public function listCustomerCoach() {
        $result = array();
        $query = 'SELECT `dex_user`.`id` AS idUser,
            `dex_user`.`firstname`,
            `dex_user`.`lastname`,
             DATE_FORMAT(`dex_user`.`birthdate`, \'%d %m %Y\') AS birthdate,
            `dex_user`.`mail`,
            `dex_customerinfo`.`id` AS idUserInfo,
            `dex_customerinfo`.`weight`,
            `dex_customerinfo`.`goal`,
            `dex_customerinfo`.`sportActivity`,
            `dex_customerinfo`.`meteringLeg`,
            `dex_customerinfo`.`meteringWaistline`,
            `dex_customerinfo`.`meteringChest`,
            `dex_customerinfo`.`meteringBiceps`,
            `dex_customerinfo`.`pictureFront`,
            `dex_coachcustomer`.`id_dex_user`,
            `dex_coachcustomer`.`id_dex_program` AS idProgram,
            `dex_coachcustomer`.`id_dex_user_customer` AS idUserCustomer
             FROM `dex_coachcustomer`
             INNER JOIN `dex_user`
             ON `dex_user`.`id` = `dex_coachcustomer`.`id_dex_user_customer`
             INNER JOIN `dex_customerinfo`
             ON `dex_customerinfo`.`id_dex_user` = `dex_user`.`id`
             WHERE `dex_coachcustomer`.`id_dex_user` = :id_dex_user';
        $listCustomerCoach = $this->db->prepare($query);
        $listCustomerCoach->bindValue(':id_dex_user', $this->id_dex_user, PDO::PARAM_INT);
        if ($listCustomerCoach->execute()) {
            $result = $listCustomerCoach->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
    
    /**
     * Méthode pour afficher les informations du coach par rapport l'id customer
     * @return type
     */
    public function coachInfoCustomer(){
        $result = array();
        $query = 'SELECT `dex_user`.`lastname` AS coachLastname,
                    `dex_user`.`firstname` AS coachFirstname, 
                    `dex_user`.`id` AS idCoach 
                    FROM `dex_user` 
                    INNER JOIN `dex_coachcustomer` 
                    ON `dex_user`.`id` = `dex_coachcustomer`.`id_dex_user` 
                    WHERE `dex_coachcustomer`.`id_dex_user_customer` = :id_dex_user_customer';
        $coachInfoCustomer = $this->db->prepare($query);
        $coachInfoCustomer->bindValue(':id_dex_user_customer', $this->id_dex_user_customer, PDO::PARAM_INT);
        if ($coachInfoCustomer->execute()) {
            $result = $coachInfoCustomer->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }
    
    /**
     * Méthode pour afficher les infos du client par rapport a l'id coach
     * @return type
     */
    public function customerInfoCoach(){
        $result = array();
        $query = 'SELECT `dex_user`.`lastname` AS customerLastname,
                    `dex_user`.`firstname` AS customerFirstname, 
                    `dex_user`.`id` AS idCustomer 
                    FROM `dex_user` 
                    INNER JOIN `dex_coachcustomer` 
                    ON `dex_user`.`id` = `dex_coachcustomer`.`id_dex_user_customer` 
                    WHERE `dex_coachcustomer`.`id_dex_user` = :id_dex_user';
        $customerInfoCoach = $this->db->prepare($query);
        $customerInfoCoach->bindValue(':id_dex_user', $this->id_dex_user, PDO::PARAM_INT);
        if ($customerInfoCoach->execute()) {
            $result = $customerInfoCoach->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }
    

    /**
     * Méthode pour supprimer l'association coach customer
     * @return type
     */
    public function deleteCoachCustomerLink() {
        $query = 'DELETE FROM `dex_coachcustomer` '
                . 'WHERE `dex_coachcustomer`.`id_dex_user` = :id_dex_user '
                . 'AND `dex_coachcustomer`.`id_dex_user_customer` = :id_dex_user_customer';
        $deleteCoachCustomer = $this->db->prepare($query);
        $deleteCoachCustomer->bindValue(':id_dex_user', $this->id_dex_user, PDO::PARAM_INT);
        $deleteCoachCustomer->bindValue(':id_dex_user_customer', $this->id_dex_user_customer, PDO::PARAM_INT);
        return $deleteCoachCustomer->execute();
    }

    /**
     * Méthode pour insérer le program associé au client et au coach
     * @return type
     */
    public function addProgramCoachCustomer() {
        $query = 'UPDATE `dex_coachcustomer` '
                . 'SET `id_dex_program` =:id_dex_program '
                . 'WHERE `id_dex_user` =:id_dex_user AND `id_dex_user_customer` =:id_dex_user_customer';
        $addProgram = $this->db->prepare($query);
        $addProgram->bindValue(':id_dex_program', $this->id_dex_program, PDO::PARAM_INT);
        $addProgram->bindValue(':id_dex_user', $this->id_dex_user, PDO::PARAM_INT);
        $addProgram->bindValue(':id_dex_user_customer', $this->id_dex_user_customer, PDO::PARAM_INT);
        return $addProgram->execute();
    }

    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}

?>