<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../../front/login.php');
    exit(); // ← toujours ajouter ça après un header pour stopper l'exécution
}

if (isset($_GET['idR'])) {
    $id= $_GET['idR'];
    $state= $_GET['etat'] ;

    include "../../../classes/Reservation.php";
    $Reservation=new Reservation();
    $Reservation->updateReservationState($id,$state);
    header('Location:reservation.php');





}
