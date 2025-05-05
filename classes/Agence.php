<?php

class Agence
{
    private $db;

    public function __construct(){
        try{
            $this->db = new PDO("mysql:host=localhost;dbname=projet_php", "root", "root");


        }catch(Exception$e){
            die('Erreur : ' . $e->getMessage());
        }
    }

    function getAllAgences(){

        $query = $this->db->query("SELECT * FROM utilisateur WHERE role = 'agence'");
        return $query;
    }

    function getAgenceById($id){
        $query = $this->db->query("SELECT * FROM utilisateur WHERE user_id = '$id'");
        return $query->fetch();
    }

    function addAgence($data, $files){


        $nom_agence= $data['nom_agence'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $adresse = $data['adresse'];
        $password = md5($data['nom_agence']);
        $e_mail= $data['e_mail'];
        $ville= $data['ville'];
        $pays= $data['pays'];
        $tel= $data['tel'];
        $role= "agence";

        $imageName   = null; // Par défaut, aucune image n'est mise à jour

        // Vérifier si un fichier image a été uploadé
        if (isset($files['image']) && $files['image']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $files['image']['tmp_name'];
            $imageName = basename($files['image']['name']);
            $destination = '../media/' . $imageName;

            // Vérifier l'extension du fichier pour éviter les fichiers non-images
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (in_array($ext, $allowedTypes)) {
                move_uploaded_file($tmpPath, $destination); // Déplace le fichier dans /media
            } else {
                echo "Type de fichier non autorisé.";
                return false;
            }
        } else {
            // Si aucune nouvelle image, on conserve l'ancienne (optionnel selon logique métier)
            $imageName = "file-uploads.jpg"; // on récupère l'image existante du formulaire caché
        }

        $this->db->exec( "INSERT INTO utilisateur  (nom_agence, nom, prenom, `e_mail`, password, adresse, ville, pays, role, tel, image )
                                                     values ('$nom_agence','$nom' , '$prenom', '$e_mail' ,'$password', '$adresse', '$ville', '$pays', '$role', '$tel', '$imageName');");







    }

    function deleteAgence($id){
        $this->db->exec("DELETE FROM utilisateur WHERE user_id='$id'");

    }



    function updateAgence($data){

        $user_id = $data['user_id'];
        $nom_agence= $data['nom_agence'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $adresse = $data['adresse'];
        $e_mail= $data['e_mail'];
        $ville= $data['ville'];
        $pays= $data['pays'];
        $tel= $data['tel'];
        $updated_at = date('Y-m-d H:i:s');

        var_dump("nom_agence aaaa " .$nom_agence);

        $imageName   = null; // Par défaut, aucune image n'est mise à jour

        // Vérifier si un fichier image a été uploadé
        if (isset($files['image']) && $files['image']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $files['image']['tmp_name'];
            $imageName = basename($files['image']['name']);
            $destination = '../media/' . $imageName;

            // Vérifier l'extension du fichier pour éviter les fichiers non-images
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (in_array($ext, $allowedTypes)) {
                move_uploaded_file($tmpPath, $destination); // Déplace le fichier dans /media
            } else {
                echo "Type de fichier non autorisé.";
                return false;
            }
        } else {
            // Si aucune nouvelle image, on conserve l'ancienne (optionnel selon logique métier)
            $imageName = $data['image']; // on récupère l'image existante du formulaire caché
        }




        // Exécuter la requête
        $this->db->exec("UPDATE utilisateur SET nom_agence='$nom_agence' ,
                                                        nom='$nom',
                                                        prenom='$prenom', 
                                                        adresse='$adresse', 
                                                        e_mail='$e_mail', 
                                                        ville='$ville', 
                                                        pays='$pays', 
                                                        tel='$tel', 
                                                        image='$imageName', 
                                                        updated_at='$updated_at'
                                                        WHERE user_id='$user_id'");


    }

}