<?php

// On créer une class database
class database {

    // Création attribut $db qui sera disponible dans ses enfants car il est en public   
    protected $db;

    function __construct() {
        // On essaye de se connecter en instanciant un nouvelle objet PDO
        try {
            // On se connecte à MySQL
            $this->db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';charset=utf8', LOGIN, PASSWORD);
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
    }

    // on crée la méthode magique __destruct qui nous permet de nous déconnecter de la base de donnée
    public function __destruct() {
        $this->db = NULL;
    }

}

?>
