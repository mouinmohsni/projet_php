<?php

class Service
{
    private $db;

    public function __construct(){
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=projet_php", "root", "root");
        }catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }






    function geAllservices($limit , $offset){
      //  $sql = "SELECT * FROM service LIMIT $limit OFFSET $offset";

        $sql = "SELECT service.*, categorie.nom_categorie AS nom_categorie
        FROM service JOIN  categorie ON service.Categorie_id = categorie.Categorie_id
        LIMIT $limit OFFSET $offset";
        return $this -> db -> query($sql);
    }

    public function countAllServices() {
        $sql = "SELECT COUNT(*) FROM service";
        return $this->db->query($sql)->fetchColumn();
    }

    public function countnOneServices( $id) {
        $sql = "SELECT COUNT(*) FROM service WHERE service.Categorie_id = $id";
        return $this->db->query($sql)->fetchColumn();
    }


    function getAllOneService($id , $limit , $offset){
        $sql = "SELECT service.*, categorie.nom_categorie AS nom_categorie
        FROM service JOIN  categorie ON service.Categorie_id = categorie.Categorie_id
        WHERE service.Categorie_id = $id  LIMIT $limit OFFSET $offset ";

        return $this->db->query($sql);
    }


}