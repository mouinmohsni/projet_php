<?php

class Reservation
{

    private $db;

    public function __construct(){
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=projet_php", "root", "root");
        }catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }

    function getAllReservations($limit, $offset){
        $sql = "SELECT * FROM reservation LIMIT $limit OFFSET $offset";
        return $this -> db -> query($sql) ;
    }

    function getReservationById($id){
        $sql = "SELECT * FROM reservation WHERE Reservation_id=$id";
        return $this -> db -> query($sql);
    }

    function addReservation($data) {

        $distination_depart= $data['distination_depart'];
        $distination_arriver= $data['distination_arriver'];
        $user_id = $data['user_id'];
        $Service_Id = $data['Service_Id'];
        $etat= "en attente";
        $date_debut = $data['date_debut'];
        $date_fin = $data['date_fin'];
        $nombre_adulte = $data['nombre_adulte'];
        $nombre_enfants = $data['nombre_enfants'];
        $prix = $data['prix'];
        $prix_total = ($prix * $nombre_adulte) + (($prix * $nombre_enfants) * 0.9);




        $sql = "INSERT INTO reservation (user_id, Service_Id,distination_depart, distination_arriver,etat, date_debut, date_fin, nombre_adulte, nombre_enfants, prix)
            VALUES ( '$user_id',  '$Service_Id','$distination_depart','$distination_arriver', '$etat', '$date_debut',  '$date_fin',  '$nombre_adulte',  '$nombre_enfants', '$prix_total')";

        $this->db->exec($sql);


    }

    function updateReservation($data) {
        $etat= $data['etat'];
        $distination_depart= $data['distination_depart'];
        $distination_arriver= $data['distination_arriver'];
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

        $sql = "UPDATE reservation SET  distination_depart = '$distination_depart',
                        distination_arriver ='$distination_arriver',
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
        $sql = "SELECT * FROM reservation where reservation.user_id='$user_id' LIMIT $limit OFFSET $offset";
        return $this -> db -> query($sql) ;
    }

    function getResevaionByService($Service_Id,$limit, $offset)
    {
        $sql= "select * from reservation where Service_Id=$Service_Id LIMIT $limit OFFSET $offset";
        return $this -> db -> query($sql) ;
    }




}