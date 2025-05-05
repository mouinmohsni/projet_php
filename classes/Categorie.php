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

    function getCategoriesById($id){
        $sql = "SELECT * FROM categorie WHERE Categorie_id = $id";
        return $this -> db -> query($sql)->fetch();
    }

}