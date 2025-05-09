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






    function getAllServicesForUsers($limit , $offset){

        $sql = "SELECT service.*, categorie.nom_categorie AS nom_categorie
        FROM service JOIN  categorie ON service.Categorie_id = categorie.Categorie_id
        LIMIT $limit OFFSET $offset";
        return $this -> db -> query($sql);
    }


    function getAllServicesForAdmin($role,$user_id,$limit,$offset){

        if($role == "admin"){
            $sql = "SELECT service.*, 
               categorie.nom_categorie AS nom_categorie, 
               utilisateur.nom AS nom_agence
        FROM service 
        JOIN categorie ON service.Categorie_id = categorie.Categorie_id
        JOIN utilisateur ON service.user_id = utilisateur.user_id
        LIMIT $limit OFFSET $offset";

        }else{
            $sql = "SELECT service.*, 
               categorie.nom_categorie AS nom_categorie, 
               utilisateur.nom AS nom_agence
        FROM service 
        JOIN categorie ON service.Categorie_id = categorie.Categorie_id
        JOIN utilisateur ON service.user_id = utilisateur.user_id
        where service.user_id=$user_id  LIMIT $limit OFFSET $offset";

        }


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
        $sql = "SELECT service.*, categorie.nom_categorie AS nom_categorie ,utilisateur.image as logo
        FROM service JOIN  categorie ON service.Categorie_id = categorie.Categorie_id JOIN utilisateur ON service.user_id = utilisateur.user_id
        
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



        $imageName   = null; // Par défaut, aucune image n'est mise à jour

        // Vérifier si un fichier image a été uploadé
        if (isset($files['url_image']) && $files['url_image']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $files['url_image']['tmp_name'];
            $imageName = basename($files['url_image']['name']);
            $destination = '../media/service/' . $imageName;

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

    function updateService($data ,$files){


        $Service_Id= $data['Service_Id'];
        $nom = $data['nom'];
        $description = $data['description'];
        $adresse = $data['adresse'];
        $Categorie_id= $data['Categorie_id'];
        $prix= (float) $data['prix'];
        $updated_at = date('Y-m-d H:i:s');




        $imageName   = null; // Par défaut, aucune image n'est mise à jour

        // Vérifier si un fichier image a été uploadé
        if (isset($files['url_image']) && $files['url_image']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $files['url_image']['tmp_name'];
            $imageName = basename($files['url_image']['name']);
            $destination = '../media/service/' . $imageName;

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

        $this->db->exec( " UPDATE service SET  nom ='$nom', description = '$description', adresse = '$adresse',
                                                        Categorie_id ='$Categorie_id' , prix ='$prix', url_image ='$imageName' ,updated_at = '$updated_at' WHERE service.Service_Id = $Service_Id");

    }

    function getServiceById($Service_Id)
    {
        $sql="SELECT service.*, categorie.nom_categorie AS nom_categorie ,utilisateur.image as logo , utilisateur.nom_agence as nom_agence
        FROM service JOIN  categorie ON service.Categorie_id = categorie.Categorie_id 
        JOIN utilisateur ON service.user_id = utilisateur.user_id
        
        WHERE Service_Id = $Service_Id";
        return $this->db->query($sql)->fetch();
    }

    function deleteService($id)
    {
        $this->db->exec("DELETE FROM service WHERE Service_Id='$id'");

    }


}