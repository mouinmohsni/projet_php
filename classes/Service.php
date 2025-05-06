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

    function addService($data ,$files){


        $nom = $data['nom'];
        $description = $data['description'];
        $adresse = $data['adresse'];
        $Categorie_id= $data['Categorie_id'];
        $prix= (float) $data['prix'];
        $user_id= $data['user_id'];
        $rating= 0 ;
        $ratings_count = 0 ;

        var_dump($files);

        $imageName   = null; // Par défaut, aucune image n'est mise à jour

        // Vérifier si un fichier image a été uploadé
        if (isset($files['url_image']) && $files['url_image']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $files['url_image']['tmp_name'];
            $imageName = basename($files['url_image']['name']);
            $destination = '../media/service' . $imageName;

            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (in_array($ext, $allowedTypes)) {
                move_uploaded_file($tmpPath, $destination);
            } else {
                echo "Type de fichier non autorisé.";
                return false;
            }
        } else {
            // Si aucune nouvelle image, on conserve l'ancienne (optionnel selon logique métier)
            $imageName = "file-uploads.jpg"; // on récupère l'image existante du formulaire caché
        }

        $this->db->exec( "INSERT INTO service  ( nom, description, adresse, Categorie_id, user_id , prix, url_image,rating ,ratings_count )
                                                     values ('$nom' , '$description','$adresse' ,'$Categorie_id', '$user_id', '$prix', '$imageName' , '$rating' ,'$ratings_count');");
    }


}