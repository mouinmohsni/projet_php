<?php

class Reservation
{

    public $db;

    public function __construct(){
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=projet_php", "root", "root");
        }catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }


    function getAllReservations($limit = null, $offset = null) {
        $sql = "SELECT r.*, 
       u.nom_agence AS agence, 
       s.nom AS nom_service, 
       u2.nom AS nom_utilisateur
FROM reservation r
JOIN service s ON r.service_id = s.Service_Id
JOIN utilisateur u ON s.user_id = u.User_Id          -- agence
JOIN utilisateur u2 ON r.user_id = u2.User_Id        -- utilisateur qui a réservé
";

        if ($limit !== null && $offset !== null) {
            $sql .= " LIMIT $limit OFFSET $offset";
        }

        return $this->db->query($sql);
    }
    function getMAxReservations(){
        $sql = "SELECT 
                s.Service_Id,
                s.nom,
                s.Categorie_id,
                c.nom_categorie,
                COUNT(r.Reservation_Id) AS nb_reservations
            FROM reservation r
            JOIN service s ON r.Service_Id = s.Service_Id
            JOIN categorie c ON s.Categorie_id = c.Categorie_id
            GROUP BY s.Service_Id
            ORDER BY nb_reservations DESC
            LIMIT 5;";
        return $this -> db -> query($sql) ;
    }

    function getReservationById($id){
        $sql = "SELECT * FROM reservation WHERE Reservation_id=$id";
        return $this -> db -> query($sql)->fetch();
    }

    function addReservation($data) {

        $destination_depart= $data['destination_depart'];
        $destination_arriver= $data['destination_arriver'];
        $user_id = $data['user_id'];
        $Service_Id = $data['Service_Id'];
        $etat= "en attente";
        $date_debut = $data['date_debut'];
        $date_fin = $data['date_fin'];
        $nombre_adulte = $data['nombre_adulte'];
        $nombre_enfants = $data['nombre_enfants'];
        $prix = $data['prix'];
        $prix_total = ($prix * $nombre_adulte) + (($prix * $nombre_enfants) * 0.9);




        $sql = "INSERT INTO reservation (user_id, Service_Id,destination_depart, destination_arriver,etat, date_debut, date_fin, nombre_adulte, nombre_enfants, prix)
            VALUES ( '$user_id',  '$Service_Id','$destination_depart','$destination_arriver', '$etat', '$date_debut',  '$date_fin',  '$nombre_adulte',  '$nombre_enfants', '$prix_total')";

        $this->db->exec($sql);


    }

    function updateReservation($data) {
        $etat= $data['etat'];
        $destination_depart= $data['destination_depart'];
        $destination_arriver= $data['destination_arriver'];
        $Reservation_Id= $data['Reservation_Id'];
        $user_id = $data['user_id'];
        $Service_Id = $data['Service_Id'];
        $date_debut = $data['date_debut'];
        $date_fin = $data['date_fin'];
        $nombre_adulte = $data['nombre_adulte'];
        $nombre_enfants = $data['nombre_enfants'];
        $prix = $data['prix'];
        $prix_total = ($prix * $nombre_adulte) + (($prix * $nombre_enfants) * 0.9);
        $updated_at=date("Y-m-d H:i:s");

        $sql = "UPDATE reservation SET  destination_depart = '$destination_depart',
                        destination_arriver ='$destination_arriver',
                        etat='$etat',
                        date_debut = '$date_debut',
                        date_fin = '$date_fin',
                        nombre_adulte ='$nombre_adulte',
                        nombre_enfants='$nombre_enfants',
                       prix ='$prix_total', 
                       updated_at ='$updated_at' 
                   where Reservation_Id='$Reservation_Id'";
        $this->db->exec($sql);
    }

    function updateReservationState($Reservation_Id,$etat) {



        $sql = "UPDATE reservation SET 
                        etat='$etat'
                         
                   where Reservation_Id='$Reservation_Id'";
        $this->db->exec($sql);
    }


    function deleteReservationById($id){
        $sql = "DELETE FROM reservation WHERE Reservation_id=$id";
        return $this -> db -> exec($sql);
    }

    function addRating($data)
    {
        $user_id = $data['user_id'];
        $note = $data['note'];
        $Service_Id= $data['Service_Id'];
        $sql = "INSERT INTO reservation (Service_Id, user_id , note) VALUES ('$Service_Id','$user_id', '$note')";
        $this -> db -> exec($sql);

        $sql_2= "SELECT ratings_count ,rating FROM service where Service_Id=$Service_Id";
        $service= $this -> db -> query($sql_2)->fetch() ;


        $ratings_count= (int)$service['ratings_count'] ;
        $rating= (float) $service['rating']  ;
        $score=($ratings_count * $rating)+$note;
        $ratings_count +=1 ;
        $rating=$score/($ratings_count);

        $sql_3 = "UPDATE service SET rating=$rating,ratings_count=$ratings_count where Service_Id=$Service_Id";
        $this -> db -> exec($sql_3);

    }

    function deleteRatingById($id){
        $sql = "DELETE FROM reservation WHERE Reservation_id=$id";
        return $this -> db -> exec($sql);
    }
    function getReservationByUser($user_id,$limit, $offset){
        $user_id=(int)$user_id ;
       $sql= "SELECT r.*, u.nom_agence, s.nom
            FROM reservation r
            JOIN service s ON r.service_id = s.Service_Id
            JOIN utilisateur u ON s.user_id = u.User_Id
            WHERE r.user_id = $user_id;";
       return $this -> db -> query($sql) ;


//        return $this->db->query("SELECT * FROM reservation where user_id=$user_id LIMIT $limit OFFSET $offset");
    }

    function getResevaionByService($Service_Id,$limit, $offset)
    {
        $sql= "select * from reservation where Service_Id=$Service_Id LIMIT $limit OFFSET $offset";
        return $this -> db -> query($sql) ;
    }




}