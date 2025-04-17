-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projet_php
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Resturent'),(2,'Destination'),(3,'Hotels'),(4,'Automotion');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `etat` varchar(45) DEFAULT NULL,
  `date_reservation` date DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `prix` decimal(6,3) DEFAULT NULL,
  `remarque` varchar(200) DEFAULT NULL,
  `Utilisateur_Id` int NOT NULL,
  `Service_Id` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Reservation_Utilisateur_idx` (`Utilisateur_Id`),
  KEY `fk_Reservation_Service1_idx` (`Service_Id`),
  CONSTRAINT `fk_Reservation_Service1` FOREIGN KEY (`Service_Id`) REFERENCES `service` (`Id`),
  CONSTRAINT `fk_Reservation_Utilisateur` FOREIGN KEY (`Utilisateur_Id`) REFERENCES `utilisateur` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `prix` decimal(7,3) DEFAULT NULL,
  `Categorie_id` int NOT NULL,
  `url_image` varchar(100) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `ratings_count` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Service_Categorie1_idx` (`Categorie_id`),
  CONSTRAINT `fk_Service_Categorie1` FOREIGN KEY (`Categorie_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (13,'Paradise Beach Hotel','Un hôtel de rêve au bord de la mer, parfait pour se détendre.','123 Rue de la Mer, Tunis',100.000,3,'explore/e2.jpg',4.7,12),(14,'Sunset Resort','Profitez d\'un coucher de soleil magique depuis la piscine à débordement.','456 Avenue Soleil, Sousse',150.000,3,'explore/e2.jpg',4.5,18),(15,'Mountain View Hotel','Vue panoramique sur les montagnes avec spa et restaurant gastronomique.','789 Route des Cimes, Ain Drahem',120.000,3,'explore/e2.jpg',4.8,9),(16,'Palm Garden Resort','Resort tropical entouré de palmiers, ambiance zen garantie.','321 Oasis Street, Djerba',200.000,3,'explore/e2.jpg',4.6,15),(17,'City Comfort Inn','Confort moderne en plein centre-ville, idéal pour les voyageurs d\'affaires.','12 Centre Ville, Tunis',80.000,3,'explore/e2.jpg',4.3,22),(18,'Royal Palace Hotel','Luxe et élégance dans un cadre historique.','99 Avenue Royale, La Marsa',250.000,3,'explore/e2.jpg',4.9,7),(25,'Le Gourmet','Cuisine raffinée dans un cadre élégant en plein centre-ville.','12 Avenue Habib Bourguiba, Tunis',20.000,1,'explore/e1.jpg',4.6,15),(26,'Chez Momo','Spécialités tunisiennes traditionnelles avec ambiance chaleureuse.','34 Rue de la Kasbah, Sidi Bou Said',10.000,1,'explore/e1.jpg',4.5,22),(27,'Soleil d\'Italie','Pizza et pâtes artisanales au feu de bois.','78 Rue de Rome, La Marsa',15.000,1,'explore/e1.jpg',4.3,18),(28,'Ocean Breeze','Fruits de mer frais servis en bord de mer.','Plage Sidi Salem, Bizerte',25.000,1,'explore/e1.jpg',4.7,10),(29,'Le Coin Bio','Cuisine bio, healthy et végétarienne.','Zone Nord, El Menzah 9',18.000,1,'explore/e1.jpg',4.4,12),(30,'Street Tacos','Ambiance urbaine avec tacos et plats mexicains.','Avenue Mohamed V, Tunis',8.000,1,'explore/e1.jpg',4.2,19),(43,'Vol Tunis - Paris','Vol direct vers Paris avec Air France. Durée 2h40, repas inclus, départ quotidien.','Aéroport Tunis-Carthage',350.000,2,'explore/e6.jpg',4.8,42),(44,'Vol Casablanca - Rome','Vol régulier vers Rome avec Royal Air Maroc. Connexion rapide et service premium.','Aéroport Mohammed V, Casablanca',420.000,2,'explore/e6.jpg',4.6,33),(45,'Vol Alger - Istanbul','Voyage vers Istanbul avec Turkish Airlines. Départ quotidien, bagage inclus.','Aéroport Houari Boumédiène, Alger',390.000,2,'explore/e6.jpg',4.7,38),(46,'Vol Dubaï - Bangkok','Long-courrier vers la Thaïlande avec Emirates. Service 5 étoiles.','Aéroport International de Dubaï',890.000,2,'explore/e6.jpg',4.9,54),(47,'Vol Le Caire - New York','Vol transatlantique direct avec EgyptAir. Confort et divertissement à bord.','Aéroport International du Caire',1350.000,2,'explore/e6.jpg',4.5,29),(48,'Vol Rabat - Doha','Vol vers le Moyen-Orient avec Qatar Airways. Connexion rapide et luxueuse.','Aéroport Rabat-Salé',620.000,2,'explore/e6.jpg',4.6,25);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `e-mail` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `gouvernorat` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-18  0:37:20
