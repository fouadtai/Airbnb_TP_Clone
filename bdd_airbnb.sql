-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: appli-vierge
-- ------------------------------------------------------
-- Server version	5.7.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES UTF8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adress`
--

DROP TABLE IF EXISTS `adress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adress` varchar(255) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adress`
--

LOCK TABLES `adress` WRITE;
/*!40000 ALTER TABLE `adress` DISABLE KEYS */;
INSERT INTO `adress` VALUES (1,'5 rue des grillons',66500,'Perpignan','France','0601020304'),(2,'10 avenue des Champs-Élysées',75008,'Paris','France','0601020305'),(3,'15 boulevard de la Liberté',31000,'Toulouse','France','0601020306'),(4,'20 rue de la République',69002,'Lyon','France','0601020307'),(5,'25 rue Sainte-Catherine',33000,'Bordeaux','France','0601020308'),(6,'30 cours Mirabeau',13100,'Aix-en-Provence','France','0601020309'),(7,'35 rue de la Paix',67000,'Strasbourg','France','0601020310'),(8,'40 rue du Faubourg Saint-Antoine',75012,'Paris','France','0601020311'),(9,'45 rue de la Pompe',75116,'Paris','France','0601020312'),(10,'50 boulevard Saint-Germain',75005,'Paris','France','0601020313'),(68,'sfs',72000,'fsdf','sdfs','0761150226');
/*!40000 ALTER TABLE `adress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipement`
--

LOCK TABLES `equipement` WRITE;
/*!40000 ALTER TABLE `equipement` DISABLE KEYS */;
INSERT INTO `equipement` VALUES (6,'Produits de nettoyage','produit.svg'),(9,'Eau chaude','eau-chaude.svg'),(10,'Lave-linge','lave-linge.svg'),(14,'Fer à repasser','fer.svg'),(15,'Étendoir à linge','etendoir.svg'),(16,'TV HD','tv.svg'),(18,'Lit pour bébé','lit-baby.svg'),(20,'Jouets et livres pour enfants','jouet.svg'),(21,'Baignoire pour bébés','baignoir-baby.svg'),(22,'Vaisselle pour enfants','vaisselle-baby.svg'),(25,'Climatisation centrale','clim.svg'),(26,'Chauffage central','chauffage.svg'),(27,'Wi-Fi','wifi.svg'),(28,'Espace de travail','bureau.svg'),(29,'Cuisine','cuisine.svg'),(30,'Réfrigérateur','frigo.svg'),(31,'Four à micro-ondes','microndes.svg'),(32,'Équipements de cuisine de base','ustensible.svg'),(33,'Vaisselle et couverts','vaisselle.svg'),(34,'Four','four.svg'),(35,'Bouilloire électrique','bouilloire.svg'),(36,'Cafetière','cafetiere.svg'),(37,'Grille-pain','grille-pain.svg'),(39,'Plaque de cuisson','plaque.svg'),(40,'Entrée privée','entrer.svg'),(41,'Entrée public','entrer.svg'),(42,'Privé : patio ou balcon','balcon.svg'),(45,'Barbecue','barbecue.svg'),(46,'Vélos','velo.svg'),(48,'Parking privé (2 places)','voiture.svg'),(49,'Parking gratuit dans la rue','voiture.svg');
/*!40000 ALTER TABLE `equipement` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `logement`
--

DROP TABLE IF EXISTS `logement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price_per_night` int(11) DEFAULT NULL,
  `nb_room` int(11) DEFAULT NULL,
  `nb_bed` int(11) DEFAULT NULL,
  `nb_bath` int(11) DEFAULT NULL,
  `nb_traveler` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `type_logement_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `adress_id` int(11) DEFAULT NULL,
  `Taille` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_logement_id` (`type_logement_id`),
  KEY `user_id` (`user_id`),
  KEY `adress_id` (`adress_id`),
  CONSTRAINT `logement_ibfk_1` FOREIGN KEY (`type_logement_id`) REFERENCES `type_logement` (`id`),
  CONSTRAINT `logement_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `logement_ibfk_3` FOREIGN KEY (`adress_id`) REFERENCES `adress` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logement`
--

LOCK TABLES `logement` WRITE;
/*!40000 ALTER TABLE `logement` DISABLE KEYS */;
INSERT INTO `logement` VALUES (1,'Appartement moderne en plein centre', 'Appartement moderne, À proximité des attractions principales et des transports publics.', 95, 2, 1, 1, 4, 1, 1, 1, 1, 100),
(2,'Maison de vacances avec vue panoramique', 'Maison de vacances spacieuse offrant une vue panoramique sur la ville. Parfaite pour les escapades en famille ou entre amis.', 200, 3, 2, 2, 6, 1, 2, 2, 2, 38),
(3,'Studio cosy près des boutiques', 'Studio confortable idéalement situé près des boutiques et des restaurants. Parfait pour les voyageurs en solo ou en couple.', 85, 1, 1, 1, 2, 1, 3, 3, 3, 250),
(4,'Maison d\'architecte avec piscine privée', 'Magnifique maison d\'architecte avec piscine privée. Idéale pour les vacances en famille dans un cadre luxueux.', 300, 4, 3, 2, 8, 1, 4, 4, 4, 200),
(5,'Appartement familial proche des écoles', 'Spacieux appartement familial situé à proximité des écoles et des parcs. Idéal pour les familles avec enfants.', 110, 3, 2, 1, 5, 1, 5, 5, 5, 150);/*!40000 ALTER TABLE `logement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logement_equipement`
--

DROP TABLE IF EXISTS `logement_equipement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logement_equipement` (
  `logement_id` int(11) NOT NULL,
  `equipement_id` int(11) NOT NULL,
  PRIMARY KEY (`logement_id`,`equipement_id`),
  KEY `equipement_id` (`equipement_id`),
  CONSTRAINT `logement_equipement_ibfk_1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`),
  CONSTRAINT `logement_equipement_ibfk_2` FOREIGN KEY (`equipement_id`) REFERENCES `equipement` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logement_equipement`
--

LOCK TABLES `logement_equipement` WRITE;
/*!40000 ALTER TABLE `logement_equipement` DISABLE KEYS */;
INSERT INTO `logement_equipement` VALUES (1,1),(6,1),(2,2),(7,2),(3,3),(8,3),(4,4),(9,4),(5,5),(10,5),(51,6),(51,7),(48,8),(52,8),(51,9),(51,10),(46,11),(47,11),(51,11),(51,13),(51,16),(51,17),(51,18),(53,21),(51,22),(46,23),(47,23),(48,23),(49,23),(50,23),(46,25),(47,25),(51,25),(48,26),(51,27),(51,28),(51,29),(51,31),(51,32),(51,33),(46,36),(47,36),(51,36),(51,38),(51,40),(52,40),(51,42),(51,43),(46,45),(47,45),(49,45),(50,45),(51,45),(51,47),(51,48),(51,49);
/*!40000 ALTER TABLE `logement_equipement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) DEFAULT NULL,
  `logement_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_id` (`logement_id`),
  CONSTRAINT `media_ibfk_1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'img1.jpg',52),(2,'img5.png',2),(3,'img35.jpeg',3),(4,'img29.jpeg',4),(5,'img14.jpg',5);
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;




-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `nb_adult` int(11) DEFAULT NULL,
  `nb_child` int(11) DEFAULT NULL,
  `price_total` float DEFAULT NULL,
  `logement_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_id` (`logement_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (35,'2024-06-21','2024-06-22',1,1,50,48,12),(36,'2024-06-21','2024-07-07',8,0,800,48,12),(37,'2024-06-22','2024-06-23',1,0,120,49,12),(41,'2024-06-21','2024-07-04',5,0,50,49,12),(42,'2024-06-20','2024-06-21',1,10,150,50,12),(43,'2024-06-20','2024-06-21',1,0,150,50,12),(44,'2024-06-20','2024-06-29',1,0,150,51,12),(45,'2024-06-20','2024-06-30',1,10,150,51,12),(46,'2024-06-20','2024-06-28',1,10,150,48,12),(47,'2024-06-20','2024-07-06',1,10,2400,49,12),(48,'2024-06-23','2024-06-27',3,1,480,50,12),(49,'2024-06-28','2024-07-05',10,0,840,51,14),(50,'2024-06-22','2024-06-23',1,2,1289,50,14),(51,'2024-06-21','2024-08-01',2,2,23042,50,14),(52,'2024-06-22','2024-06-23',1,0,23,48,14),(53,'2024-06-28','2024-06-29',3,1,200,52,14),(54,'2024-07-14','2024-07-21',4,2,9023,51,15),(55,'2024-07-14','2024-07-17',1,0,45,47,15);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_logement`
--

DROP TABLE IF EXISTS `type_logement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_logement`
--

LOCK TABLES `type_logement` WRITE;
/*!40000 ALTER TABLE `type_logement` DISABLE KEYS */;
INSERT INTO `type_logement` VALUES (1,'luxe','img.png',1),(3,'villa','img2.png',1),(4,'appartement','img3.png',1),(5,'Chateaux','img4.png',1),(8,'Camping','img7.png',1);/*!40000 ALTER TABLE `type_logement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',  
  `adress_id` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `adress_id` (`adress_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`adress_id`) REFERENCES `adress` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'user1@example.com','$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS','Dupont','Jean',1,1,NULL),(2,'user2@example.com','$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS','Martin','Jacques',1,2,NULL),(3,'user3@example.com','$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS','Bernard','Pierre',1,3,NULL),(4,'user4@example.com','$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS','Thomas','Paul',1,4,NULL),(5,'user5@example.com','$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS','Petit','Nicolas',1,5,NULL),(6,'user6@example.com','$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS','Robert','Maxime',1,6,NULL),(7,'user7@example.com','$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS','Richard','François',1,7,NULL),(8,'user8@example.com','$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS','Lefevre','Julien',1,8,NULL),(9,'user9@example.com','$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS','Durand','Jérôme',1,9,NULL),(10,'user10@example.com','$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS','Moreau','Benjamin',1,10,NULL),(15,'admin@admin.com','$2y$10$hOFGMMOaRzkaC/Mr.i65h.gqxn0DOvMkxqxY0Ao5wtwIrWaQ0SjIW','d','F',1,NULL,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `pays_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pays_id` (`pays_id`),
  CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ville`
--

LOCK TABLES `ville` WRITE;
/*!40000 ALTER TABLE `ville` DISABLE KEYS */;
INSERT INTO `ville` VALUES (44,'Madrid',2),(45,'Rome',3),(46,'Berlin',4),(47,'Amsterdam',5),(48,'Prague',6);
/*!40000 ALTER TABLE `ville` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-06 15:26:50
