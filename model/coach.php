<?php

/* On crée une class coach qui hérite de la classe database via extends
 * La classe coach va nous permettre d'accéder à la table coach
 */

class coach extends database {

    public $id = 0;
    public $pictureBjeps = '';
    public $experience = '';
    public $bio = '';
    public $checkinfo = 1;
    public $id_dex_user = 0;
    
    
    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * Méthode qui ajoute les informations spécifique au profil coach
     * @return type
     */
    function addCoachInfo() {
        $query = 'INSERT INTO `dex_coachinfo` (`pictureBjeps`, `experience`, `bio`, `id_dex_user`) '
                . 'VALUES (:pictureBjeps, :experience, :bio, :id_dex_user)';
        $addCoach = $this->db->prepare($query);
        $addCoach->bindValue(':pictureBjeps', $this->pictureBjeps, PDO::PARAM_STR);
        $addCoach->bindValue(':experience', $this->experience, PDO::PARAM_INT);
        $addCoach->bindValue(':bio', $this->bio, PDO::PARAM_STR);
        $addCoach->bindValue(':id_dex_user', $this->id_dex_user, PDO::PARAM_INT);
        return $addCoach->execute();
    }
    /**
     * Méthode qui passe le  booleans checkinfo de la table user a 1 si le coach a remplis ses informations
     * @return type
     */
    function checkInfo(){
        $query = 'UPDATE `dex_user` SET `checkinfo` =:checkinfo WHERE id =:id';
        $result = $this->db->prepare($query);
        $result->bindValue(':checkinfo', $this->checkinfo, PDO::PARAM_INT);
        $result->bindValue (':id', $this->id, PDO::PARAM_INT);
         return $result->execute();
    }

    /**
     * Méthode pour afficher les informations de coachInfo
     * @return boolean
     */
    function getCoachInfo() {
        $return = FALSE;
        $isOk = FALSE;
        $query = 'SELECT `pictureBjeps`,`experience`, `bio` FROM `dex_coachinfo` WHERE `id_dex_user` = :id';
        $selectCoachInfo = $this->db->prepare($query);
        //on associe notre marqueur nominatif :id a notre attribu id grâce au $this.
        $selectCoachInfo->bindValue(':id', $this->id, PDO::PARAM_INT);
        //si la requete c'est bien executé alors on rempli $return avec un objet         
        if ($selectCoachInfo->execute()) {
            $return = $selectCoachInfo->fetch(PDO::FETCH_OBJ);
        }
        //si $return est un objet alors on hydrate       
        if (is_object($return)) {
            $this->pictureBjeps = $return->pictureBjeps;
            $this->experience = $return->experience;
            $this->bio = $return->bio;
            $isOk = TRUE;
        }
        return $isOk;
    }
    
    /**
     * Méthode pour update les informations de coach info.
     * @return type
     */
    function updateCoachInfo(){
        $query = 'UPDATE `dex_coachinfo` SET `pictureBjeps` =:pictureBjeps, `experience` =:experience, `bio` =:bio, `pictureProfil` =:pictureProfil WHERE `id_dex_user` = :id';
        $updateCoachInfo = $this->db->prepare($query);
        $updateCoachInfo->bindValue(':pictureBjeps', $this->pictureBjeps, PDO::PARAM_STR);
        $updateCoachInfo->bindValue(':experience', $this->pictureBjeps, PDO::PARAM_STR);
        $updateCoachInfo->bindValue(':bio', $this->pictureBjeps, PDO::PARAM_STR);
        $updateCoachInfo->bindValue(':pictureProfil', $this->pictureBjeps, PDO::PARAM_STR);
        $updateCoachInfo->bindValue(':id', $this->id_dex_user, PDO::PARAM_INT);
        return $updateCoachInfo->execute();
    }
    
    /**
     * Méthode pour afficher la liste des coachs et leurs informations
     * @return type
     */
    function listCoach(){
        $result = array();
        $query = 'SELECT `dex_user`.`id` AS `idUser`,`dex_user`.`firstname`,`dex_user`.`lastname`,DATE_FORMAT(`dex_user`.`birthdate`, \'%d %m %Y\') AS birthdate,`dex_user`.`mail`, `dex_user`.`avatar`,`dex_coachinfo`.`id` AS `idCoach`,`dex_coachinfo`.`pictureBjeps`,`dex_coachinfo`.`experience`,`dex_coachinfo`.`bio` '
                . 'FROM `dex_user` '
                . 'INNER JOIN `dex_coachinfo` ON `dex_user`.`id` = `dex_coachinfo`.`id_dex_user` '
                . 'WHERE `id_dex_role` =2';
        $listCoach = $this->db->query($query);
        if (is_object($listCoach)) {
            $result = $listCoach->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }


    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}

?>