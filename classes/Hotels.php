<?php

class Hotels
{
    private $db;

    public function __construct(){
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=projet_php", "root", "root");
        }catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }

    function geAllhotels(){
        $sql = "SELECT service.*, categorie.nom AS nom_categorie
        FROM service JOIN  categorie ON service.Categorie_id = categorie.id
        WHERE service.Categorie_id = 3";

        return $this->db->query($sql);
    }


}