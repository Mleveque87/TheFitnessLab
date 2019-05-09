<?php

/* On crée une class user qui hérite de la classe database via extends
 * La classe user va nous permettre d'accéder à la table user
 */

class user extends database {

    public $id = 0;
    public $firstName = '';
    public $lastName = '';
    public $birthDate = '0000-00-00';
    public $gender = 1;
    public $mail = '';
    public $password = '';
    public $dateRegistrer = '0000-00-00';
    public $role = 3; //3 est le client
    public $id_dex_role = 0;
    public $id_dex_gender = 0;
    public $checkinfo = 0;

    function __construct() {
        parent::__construct();
    }

    /**
     * Méthode qui enregistre un User sur le site
     * @return type
     */
    function addUser() {
        $query = 'INSERT INTO `dex_user` (`firstname`, `lastname`, `birthdate`, `mail`, `password`, `id_dex_role`, `id_dex_gender`) '
                . 'VALUES (:firstName, :lastName, :birthDate, :mail, :password, :id_dex_role, :id_dex_gender)';
        $result = $this->db->prepare($query);
        $result->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $result->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $result->bindValue(':birthDate', $this->birthDate, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':id_dex_role', $this->role, PDO::PARAM_STR);
        $result->bindValue(':id_dex_gender', $this->gender, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Méthode qui vérifie si une adresse mail est libre. 
     * 0 : L'adresse mail n'existe pas
     * 1 : Elle existe
     * @return type
     */
    function checkFreeMail() {
        $query = 'SELECT COUNT(*) AS `nbMail` FROM `dex_user` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        $checkFreeMail = $result->fetch(PDO::FETCH_OBJ);
        return $checkFreeMail->nbMail;
    }

    /**
     * Méthode qui retourne le hashage du mot de passe du compte sélectionné.
     * @return type
     */
    function getHashFromUser() {
        $query = 'SELECT `password` FROM `dex_user` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }

    /**
     *  Méthode qui récupère les infos utiles de l'utilisateur après sa connection
     * @return type
     */
    function getUserInfo() {
        $result = array();
        $query = 'SELECT `firstname`, `lastname`, DATE_FORMAT(`birthdate`, \'%d %m %Y\') AS birthdate, `mail`, `id_dex_role`, `id` , `checkinfo` FROM `dex_user` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode qui affiche les informations du client en vue coach
     * @return type
     */
    function getUserInfoViewCoach() {
        $result = array ();
        $query = 'SELECT firstname, lastname, DATE_FORMAT(birthdate, \'%d %m %Y\') AS birthdate, mail, id_dex_role, id , checkinfo FROM dex_user WHERE id = :id';
        $result = $this->db->prepare($query);
        $result->bindValue(':id', $this->id, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode pour update les infos de user
     * @return type
     */
    function updateUserInfo() {
        $query = 'UPDATE `dex_user` SET `firstname` =:firstname, `lastname` =:lastname, `birthdate` =:birthdate, `mail` =:mail, `password` =:password '
                . 'WHERE `id` =:id';
        $updateUserInfo = $this->db->prepare($query);
        $updateUserInfo->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $updateUserInfo->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $updateUserInfo->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $updateUserInfo->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $updateUserInfo->bindValue(':password', $this->password, PDO::PARAM_STR);
        $updateUserInfo->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $updateUserInfo->execute();
    }

    function deleteUser() {
        $query = 'DELETE FROM `dex_user` WHERE `id` =:id';
        $deleteUser = $this->db->prepare($query);
        $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteUser->execute();
    }

    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}

?>