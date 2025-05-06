<?php

class Categorie
{

    private $db ;

    public function __construct(){

        $host = "localhost";
        $user = "root";
        $password = "root";
        $database = "projet_php";
        try{
            $this -> db = new PDO("mysql:host=$host; dbname=$database" , $user , $password);
            $this -> db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        }catch(Exception $e){
            die('Erreur : ' .$e->getMessage());
        }

    }

    function getAllCategories(){
        $sql = "SELECT * FROM categorie";
       return $this -> db -> query($sql);
    }

    function getAllCategoriesWithServiceCount() {
        $sql = "SELECT c.*, COUNT(s.Categorie_id) AS service_count
            FROM categorie c
            LEFT JOIN service s ON c.Categorie_id = s.Categorie_id
            GROUP BY c.Categorie_id";

        return $this->db->query($sql);
    }


    function getCategoriesById($id){
        $sql = "SELECT * FROM categorie WHERE Categorie_id = $id";
        return $this -> db -> query($sql)->fetch();
    }


    function addCategorie($data){
        $nom_categorie = $data["nom_categorie"];
        $image = $data["image"];
        $description = $data["description"];

        $this->db->exec( "INSERT INTO categorie  (nom_categorie, image, description)
                                                     values ('$nom_categorie','$image' , '$description');");

    }

    function updateCategorie($data) {
        $id = $data["Categorie_id"];
        $nom_categorie = $data["nom_categorie"];
        $image = $data["image"];
        $description = $data["description"];
        $updated_at = date("Y-m-d H:i:s");
        $this->db->exec("UPDATE categorie SET nom_categorie='$nom_categorie' ,
                                                        image='$image',
                                                        description='$description', 
                                                        updated_at='$updated_at'
                                                        WHERE Categorie_id='$id'");
    }

    function deleteCategorie($id)
    {
        $this->db->exec("DELETE FROM categorie WHERE Categorie_id='$id'");
    }


}