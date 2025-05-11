<?php

class User
{

   private $db ;

   public function __construct(){

       try {
           $this -> db = new PDO("mysql:host=localhost;dbname=projet_php", "root", "root");

       }catch (Exception $e){
           die('Erreur : ' . $e->getmessage());
       }
   }

   function getUserWithMail($data)
   {
       $mail=$data['e_mail'];

       $sql = "SELECT * FROM utilisateur WHERE e_mail = :mail";
       $query = $this->db->prepare($sql);
       $query->execute(['mail' => $mail]);

       return $query ->fetch(); // fetch() ici est sur le PDOStatement, c’est correct

   }
    function getUserById($id)
    {
        $sql = "SELECT * FROM utilisateur WHERE user_id = '$id'";

        return $this -> db -> query($sql) ->fetch() ;

    }

   function addUser($data){
       $nom=$data['nom'];
       $prenom=$data['prenom'];
       $email=$data['e_mail'];
       $password=md5($data['password']);
       $adresse=$data['adresse'];
       $ville=$data['ville'];
       $pays=$data['pays'];
       $tel=$data['tel'];
       $role= "user";

       $sql = "INSERT INTO utilisateur (nom, prenom, e_mail, password, adresse, ville, pays, role, tel)
        VALUES (:nom, :prenom, :email, :password, :adresse, :ville, :pays, :role, :tel)";

       $stmt = $this->db->prepare($sql);

       $stmt->execute([
           ':nom'      => $nom,
           ':prenom'   => $prenom,
           ':email'    => $email,
           ':password' => $password,
           ':adresse'  => $adresse,
           ':ville'    => $ville,
           ':pays'     => $pays,
           ':role'     => $role,
           ':tel'      => $tel
       ]);

       $userId = $this->db->lastInsertId(); // 👈 Récupère l'ID du nouvel utilisateur

       return $userId;

   }

    function updateUser($data)
    {
        $user_id=$data['user_id'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $email = $data['e_mail'];
            var_dump($data);
        if($data['password']==""){
            $password = "";
        }else{
            $password = md5($data['password']);
        }
        $adresse = $data['adresse'];
        $ville = $data['ville'];
        $pays = $data['pays'];
        $tel = $data['tel'];
        $updated_at=date("Y-m-d H:i:s");

        if ($password==""){
            $this->db->exec( " UPDATE utilisateur SET  nom ='$nom', prenom = '$prenom', adresse = '$adresse',e_mail='$email',
                            ville='$ville',pays='$pays',tel='$tel',updated_at = '$updated_at' WHERE utilisateur.user_id = $user_id");

        }else{

            $this->db->exec( " UPDATE utilisateur SET  nom ='$nom', prenom = '$prenom', adresse = '$adresse',e_mail='$email',
                            password='$password',ville='$ville',pays='$pays',tel='$tel',updated_at = '$updated_at' WHERE utilisateur.user_id = $user_id");
        }


    }

}