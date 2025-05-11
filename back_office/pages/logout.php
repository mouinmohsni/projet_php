<?php
session_start();

if($_SESSION['role'] == "user"){

    session_unset();     // Supprime toutes les variables de session
    session_destroy();   // Détruit la session

// Redirige vers la page de login (ou accueil)
    header('Location: ../../front/index.php');

}else{
    session_unset();     // Supprime toutes les variables de session
    session_destroy();   // Détruit la session

// Redirige vers la page de login (ou accueil)
    header('Location: ../../front/login.php');
}

exit();
