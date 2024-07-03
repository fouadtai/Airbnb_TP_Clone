-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: appli-airbnb
-- ------------------------------------------------------
-- Server version	5.7.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES UTF8 */
;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;
/*!40103 SET TIME_ZONE='+00:00' */
;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

--
-- Table structure for table `adress`
--

DROP TABLE IF EXISTS `adress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `adress` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `adress` varchar(255) DEFAULT NULL,
    `zip_code` int(11) DEFAULT NULL,
    `city` varchar(255) DEFAULT NULL,
    `country` varchar(255) DEFAULT NULL,
    `phone` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 68 DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `adress`
--

LOCK TABLES `adress` WRITE;
/*!40000 ALTER TABLE `adress` DISABLE KEYS */
;

INSERT INTO
    `adress`
VALUES (
        1,
        '5 rue des grillons',
        66500,
        'Perpignan',
        'France',
        '0601020304'
    ),
    (
        2,
        '10 avenue des Champs-Élysées',
        75008,
        'Paris',
        'France',
        '0601020305'
    ),
    (
        3,
        '15 boulevard de la Liberté',
        31000,
        'Toulouse',
        'France',
        '0601020306'
    ),
    (
        4,
        '20 rue de la République',
        69002,
        'Lyon',
        'France',
        '0601020307'
    ),
    (
        5,
        '25 rue Sainte-Catherine',
        33000,
        'Bordeaux',
        'France',
        '0601020308'
    ),
    (
        6,
        '30 cours Mirabeau',
        13100,
        'Aix-en-Provence',
        'France',
        '0601020309'
    ),
    (
        7,
        '35 rue de la Paix',
        67000,
        'Strasbourg',
        'France',
        '0601020310'
    ),
    (
        8,
        '40 rue du Faubourg Saint-Antoine',
        75012,
        'Paris',
        'France',
        '0601020311'
    ),
    (
        9,
        '45 rue de la Pompe',
        75116,
        'Paris',
        'France',
        '0601020312'
    ),
    (
        10,
        '50 boulevard Saint-Germain',
        75005,
        'Paris',
        'France',
        '0601020313'
    ),
    (
        61,
        'gyugyu',
        5412,
        'Kuruktulu',
        'Yougoslavie',
        '0621849081'
    ),
    (
        62,
        'gyugyu',
        5412,
        'Kuruktulu',
        'Yougoslavie',
        '0621849081'
    ),
    (
        63,
        'gyugyu',
        1144,
        'll',
        'll',
        '0621849081'
    ),
    (
        64,
        '11',
        5412,
        '11',
        '11',
        '0621849081'
    ),
    (
        65,
        'mm',
        5412,
        'Kuruktulu',
        'Yougoslavie',
        '0621849081'
    ),
    (
        66,
        'Rue ChateauBriant',
        31000,
        'Toulouse',
        'Yougoslavie',
        '0621849081'
    ),
    (
        67,
        '1',
        5412,
        'Kuruktulu',
        'Yougoslavie',
        '0621849081'
    );
/*!40000 ALTER TABLE `adress` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `equipement` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `label` varchar(255) DEFAULT NULL,
    `image_path` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 50 DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `equipement`
--

LOCK TABLES `equipement` WRITE;
/*!40000 ALTER TABLE `equipement` DISABLE KEYS */
;

INSERT INTO
    `equipement`
VALUES (
        6,
        'Produits de nettoyage',
        'produit.svg'
    ),
    (
        7,
        'Shampooing',
        'shampooing.svg'
    ),
    (
        8,
        'Douche extérieure',
        'douche-ex.svg'
    ),
    (
        9,
        'Eau chaude',
        'eau-chaude.svg'
    ),
    (
        10,
        'Lave-linge',
        'lave-linge.svg'
    ),
    (11, 'Draps', 'draps.svg'),
    (
        12,
        'Oreillers et couvertures supplémentaires',
        'oreiller.svg'
    ),
    (13, 'Stores', 'store.svg'),
    (
        14,
        'Fer à repasser',
        'fer.svg'
    ),
    (
        15,
        'Étendoir à linge',
        'etendoir.svg'
    ),
    (16, 'TV HD', 'tv.svg'),
    (
        17,
        'Système audio',
        'audio.svg'
    ),
    (
        18,
        'Lit pour bébé',
        'lit-baby.svg'
    ),
    (
        19,
        'Lit parapluie',
        'lit-parapluie.svg'
    ),
    (
        20,
        'Jouets et livres pour enfants',
        'jouet.svg'
    ),
    (
        21,
        'Baignoire pour bébés',
        'baignoir-baby.svg'
    ),
    (
        22,
        'Vaisselle pour enfants',
        'vaisselle-baby.svg'
    ),
    (
        23,
        'Caches-prises',
        'cache-prise.svg'
    ),
    (
        24,
        'Barrières de sécurité pour bébé',
        'security-barriere.svg'
    ),
    (
        25,
        'Climatisation centrale',
        'clim.svg'
    ),
    (
        26,
        'Chauffage central',
        'chauffage.svg'
    ),
    (27, 'Wi-Fi', 'wifi.svg'),
    (
        28,
        'Espace de travail',
        'bureau.svg'
    ),
    (29, 'Cuisine', 'cuisine.svg'),
    (
        30,
        'Réfrigérateur',
        'frigo.svg'
    ),
    (
        31,
        'Four à micro-ondes',
        'microndes.svg'
    ),
    (
        32,
        'Équipements de cuisine de base',
        'ustensible.svg'
    ),
    (
        33,
        'Vaisselle et couverts',
        'vaisselle.svg'
    ),
    (34, 'Four', 'four.svg'),
    (
        35,
        'Bouilloire électrique',
        'bouilloire.svg'
    ),
    (
        36,
        'Cafetière',
        'cafetiere.svg'
    ),
    (
        37,
        'Grille-pain',
        'grille-pain.svg'
    ),
    (
        38,
        'Table à manger',
        'table-manger.svg'
    ),
    (
        39,
        'Plaque de cuisson',
        'plaque.svg'
    ),
    (
        40,
        'Entrée privée',
        'entrer.svg'
    ),
    (
        41,
        'Entrée public',
        'entrer.svg'
    ),
    (
        42,
        'Privé : patio ou balcon',
        'balcon.svg'
    ),
    (
        43,
        'Mobilier extérieur',
        'mobilier.svg'
    ),
    (
        44,
        'Espace repas en plein air',
        'mobilier.svg'
    ),
    (
        45,
        'Barbecue',
        'barbecue.svg'
    ),
    (46, 'Vélos', 'velo.svg'),
    (
        47,
        'Chaises longues',
        'chaise-longue.svg'
    ),
    (
        48,
        'Parking privé (2 places)',
        'voiture.svg'
    ),
    (
        49,
        'Parking gratuit dans la rue',
        'voiture.svg'
    );
/*!40000 ALTER TABLE `equipement` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `favoris` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `logement_id` int(11) DEFAULT NULL,
    `user_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `logement_id` (`logement_id`),
    KEY `user_id` (`user_id`),
    CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`),
    CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `favoris`
--

LOCK TABLES `favoris` WRITE;
/*!40000 ALTER TABLE `favoris` DISABLE KEYS */
;
/*!40000 ALTER TABLE `favoris` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `logement`
--

DROP TABLE IF EXISTS `logement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!40101 SET character_set_client = utf8 */
;

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
) ENGINE = InnoDB AUTO_INCREMENT = 53 DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `logement`
--

LOCK TABLES `logement` WRITE;
/*!40000 ALTER TABLE `logement` DISABLE KEYS */
;

INSERT INTO
    `logement`
VALUES (
        1,
        'Jolie appartement situé au calme',
        'Séjournez dans cet appartement cosy situé en plein cœur de Paris. Il dispose d\'une chambre lumineuse, d\'une cuisine entièrement équipée, d\'un salon confortable et d\'une salle de bain privée. Parfaitement situé près des principales attractions, cafés et boutiques.',
        50,
        3,
        3,
        2,
        4,
        1,
        1,
        1,
        1,
        100
    ),
    (
        2,
        'Loft moderne avec vue sur la mer',
        'Loft spacieux et moderne avec une vue imprenable sur la mer. Comprend une chambre avec un lit king-size, une cuisine équipée et un balcon.',
        120,
        2,
        1,
        1,
        2,
        1,
        2,
        2,
        2,
        38
    ),
    (
        3,
        'Studio charmant proche des musées',
        'Studio confortable situé à proximité des principaux musées. Idéal pour les couples ou les voyageurs en solo.',
        70,
        1,
        1,
        1,
        2,
        1,
        3,
        3,
        3,
        250
    ),
    (
        4,
        'Maison familiale avec jardin',
        'Grande maison familiale avec un jardin spacieux. Parfaite pour les familles avec enfants. Proche des parcs et des écoles.',
        150,
        5,
        4,
        2,
        6,
        1,
        4,
        4,
        4,
        200
    ),
    (
        5,
        'Appartement lumineux au centre-ville',
        'Appartement lumineux avec une grande fenêtre donnant sur la rue principale. Proche des restaurants et des boutiques.',
        90,
        2,
        2,
        1,
        4,
        1,
        5,
        5,
        5,
        150
    ),
    (
        6,
        'Petit cottage à la campagne',
        'Charmant petit cottage situé en pleine campagne. Idéal pour une escapade tranquille.',
        60,
        2,
        1,
        1,
        3,
        1,
        6,
        6,
        6,
        99
    ),
    (
        7,
        'Penthouse de luxe avec terrasse',
        'Penthouse de luxe avec une grande terrasse offrant une vue panoramique sur la ville. Comprend trois chambres et deux salles de bain.',
        300,
        4,
        3,
        2,
        6,
        1,
        7,
        7,
        7,
        174
    ),
    (
        8,
        'Appartement confortable près de la gare',
        'Appartement confortable et bien équipé, situé à deux pas de la gare principale. Pratique pour les voyageurs en transit.',
        80,
        2,
        1,
        1,
        3,
        1,
        8,
        8,
        8,
        130
    ),
    (
        9,
        'Villa spacieuse avec piscine',
        'Villa spacieuse avec une grande piscine et un jardin privé. Parfaite pour les groupes ou les familles nombreuses.',
        250,
        6,
        5,
        3,
        10,
        1,
        9,
        9,
        9,
        120
    ),
    (
        10,
        'Chalet rustique en montagne',
        'Chalet rustique et chaleureux situé en montagne. Idéal pour les amateurs de ski et de randonnée.',
        110,
        3,
        3,
        2,
        5,
        1,
        10,
        10,
        10,
        100
    ),
    (
        46,
        'Maison',
        'très peu de place',
        15,
        2,
        2,
        2,
        4,
        1,
        5,
        12,
        61,
        111
    ),
    (
        47,
        'Maison',
        'très peu de place',
        15,
        2,
        2,
        2,
        4,
        1,
        5,
        12,
        62,
        111
    ),
    (
        48,
        'll',
        'll',
        23,
        2,
        2,
        2,
        2,
        1,
        2,
        12,
        63,
        2
    ),
    (
        49,
        '11',
        '11',
        11,
        1,
        1,
        1,
        1,
        1,
        2,
        12,
        64,
        11
    ),
    (
        50,
        'appart',
        'bien situé',
        562,
        1,
        2,
        1,
        3,
        1,
        2,
        12,
        65,
        47
    ),
    (
        51,
        'Grand chateau',
        'Chateau du XIV siècle, ayant appartenu à Mimi Mathy',
        1289,
        10,
        10,
        10,
        20,
        1,
        5,
        12,
        66,
        482
    ),
    (
        52,
        'Appartement',
        'Jolie appartement bien situé',
        200,
        2,
        2,
        2,
        2,
        1,
        5,
        12,
        67,
        200
    );
/*!40000 ALTER TABLE `logement` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `logement_equipement`
--

DROP TABLE IF EXISTS `logement_equipement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `logement_equipement` (
    `logement_id` int(11) NOT NULL,
    `equipement_id` int(11) NOT NULL,
    PRIMARY KEY (
        `logement_id`,
        `equipement_id`
    ),
    KEY `equipement_id` (`equipement_id`),
    CONSTRAINT `logement_equipement_ibfk_1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`),
    CONSTRAINT `logement_equipement_ibfk_2` FOREIGN KEY (`equipement_id`) REFERENCES `equipement` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `logement_equipement`
--

LOCK TABLES `logement_equipement` WRITE;
/*!40000 ALTER TABLE `logement_equipement` DISABLE KEYS */
;

INSERT INTO
    `logement_equipement`
VALUES (1, 1),
    (6, 1),
    (2, 2),
    (7, 2),
    (3, 3),
    (8, 3),
    (4, 4),
    (9, 4),
    (5, 5),
    (10, 5),
    (51, 6),
    (51, 7),
    (48, 8),
    (52, 8),
    (51, 9),
    (51, 10),
    (46, 11),
    (47, 11),
    (51, 11),
    (51, 13),
    (51, 16),
    (51, 17),
    (51, 18),
    (51, 22),
    (46, 23),
    (47, 23),
    (48, 23),
    (49, 23),
    (50, 23),
    (46, 25),
    (47, 25),
    (51, 25),
    (48, 26),
    (51, 27),
    (51, 28),
    (51, 29),
    (51, 31),
    (51, 32),
    (51, 33),
    (46, 36),
    (47, 36),
    (51, 36),
    (51, 38),
    (51, 40),
    (52, 40),
    (51, 42),
    (51, 43),
    (46, 45),
    (47, 45),
    (49, 45),
    (50, 45),
    (51, 45),
    (51, 47),
    (51, 48),
    (51, 49);
/*!40000 ALTER TABLE `logement_equipement` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `media` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `image_path` varchar(255) DEFAULT NULL,
    `logement_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `logement_id` (`logement_id`),
    CONSTRAINT `media_ibfk_1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 18 DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */
;

INSERT INTO
    `media`
VALUES (1, 'img1.jpg', 52),
    (2, 'img2.png', 2),
    (3, 'img3.jpeg', 3),
    (4, 'img4.jpeg', 4),
    (5, 'img5.jpg', 5),
    (6, 'img6.jpg', 6),
    (7, 'img7.jpg', 7),
    (8, 'img8.jpg', 8),
    (9, 'img9.jpg', 9),
    (10, 'img10.jpg', 10),
    (
        11,
        '66729efc43f17_d037fa5a-1b6f-4202-af09-f90bbeada831.jpg',
        46
    ),
    (
        12,
        '6672af0ea8888_d037fa5a-1b6f-4202-af09-f90bbeada831.jpg',
        47
    ),
    (
        13,
        '6673cde12a5a5_611b18ce-a6b9-46de-bcbe-caa22e7048d7.jpeg',
        48
    ),
    (
        14,
        '6673d656ea1a8_ef01caf4-ec1b-4339-adfc-64e72409312b.jpeg',
        49
    ),
    (
        15,
        '6673e86440919_8765d62b-55ad-4897-8903-eda70c73b3d1.jpeg',
        50
    ),
    (
        16,
        '66742897abc13_40a4477b-13e3-42f6-8d33-d91c3d6715ea.jpeg',
        51
    ),
    (
        17,
        '667572c8e0359_pic_du_canigou.jpg',
        52
    );
/*!40000 ALTER TABLE `media` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!40101 SET character_set_client = utf8 */
;

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
) ENGINE = InnoDB AUTO_INCREMENT = 54 DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */
;

INSERT INTO
    `reservation`
VALUES (
        35,
        '2024-06-21',
        '2024-06-22',
        1,
        1,
        50,
        48,
        12
    ),
    (
        36,
        '2024-06-21',
        '2024-07-07',
        8,
        0,
        800,
        48,
        12
    ),
    (
        37,
        '2024-06-22',
        '2024-06-23',
        1,
        0,
        120,
        49,
        12
    ),
    (
        41,
        '2024-06-21',
        '2024-07-04',
        5,
        0,
        50,
        49,
        12
    ),
    (
        42,
        '2024-06-20',
        '2024-06-21',
        1,
        10,
        150,
        50,
        12
    ),
    (
        43,
        '2024-06-20',
        '2024-06-21',
        1,
        0,
        150,
        50,
        12
    ),
    (
        44,
        '2024-06-20',
        '2024-06-29',
        1,
        0,
        150,
        51,
        12
    ),
    (
        45,
        '2024-06-20',
        '2024-06-30',
        1,
        10,
        150,
        51,
        12
    ),
    (
        46,
        '2024-06-20',
        '2024-06-28',
        1,
        10,
        150,
        48,
        12
    ),
    (
        47,
        '2024-06-20',
        '2024-07-06',
        1,
        10,
        2400,
        49,
        12
    ),
    (
        48,
        '2024-06-23',
        '2024-06-27',
        3,
        1,
        480,
        50,
        12
    ),
    (
        49,
        '2024-06-28',
        '2024-07-05',
        10,
        0,
        840,
        51,
        14
    ),
    (
        50,
        '2024-06-22',
        '2024-06-23',
        1,
        2,
        1289,
        50,
        14
    ),
    (
        51,
        '2024-06-21',
        '2024-08-01',
        2,
        2,
        23042,
        50,
        14
    ),
    (
        52,
        '2024-06-22',
        '2024-06-23',
        1,
        0,
        23,
        48,
        14
    ),
    (
        53,
        '2024-06-28',
        '2024-06-29',
        3,
        1,
        200,
        52,
        14
    );
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `type_logement`
--

DROP TABLE IF EXISTS `type_logement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `type_logement` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `label` varchar(255) DEFAULT NULL,
    `image_path` varchar(255) DEFAULT NULL,
    `is_active` tinyint(1) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 11 DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `type_logement`
--

LOCK TABLES `type_logement` WRITE;
/*!40000 ALTER TABLE `type_logement` DISABLE KEYS */
;

INSERT INTO
    `type_logement`
VALUES (1, 'luxe', 'img.png', 1),
    (
        2,
        'cabanes perchées',
        'img1.png',
        1
    ),
    (3, 'Avec vue', 'img2.png', 1),
    (4, 'Campagne', 'img3.png', 1),
    (5, 'Chateaux', 'img4.png', 1),
    (6, 'Fermes', 'img5.png', 1),
    (7, 'Tendances', 'img6.png', 1),
    (8, 'Camping', 'img7.png', 1),
    (9, 'Atypique', 'img8.png', 1),
    (10, 'Arctique', 'img9.png', 1);
/*!40000 ALTER TABLE `type_logement` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!40101 SET character_set_client = utf8 */
;

CREATE TABLE `user` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) DEFAULT NULL,
    `password` varchar(255) DEFAULT NULL,
    `lastname` varchar(255) DEFAULT NULL,
    `firstname` varchar(255) DEFAULT NULL,
    `is_active` tinyint(1) DEFAULT NULL,
    `adress_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `adress_id` (`adress_id`),
    CONSTRAINT `user_ibfk_1` FOREIGN KEY (`adress_id`) REFERENCES `adress` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */
;

INSERT INTO
    `user`
VALUES (
        1,
        'user1@example.com',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'Dupont',
        'Jean',
        1,
        1
    ),
    (
        2,
        'user2@example.com',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'Martin',
        'Jacques',
        1,
        2
    ),
    (
        3,
        'user3@example.com',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'Bernard',
        'Pierre',
        1,
        3
    ),
    (
        4,
        'user4@example.com',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'Thomas',
        'Paul',
        1,
        4
    ),
    (
        5,
        'user5@example.com',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'Petit',
        'Nicolas',
        1,
        5
    ),
    (
        6,
        'user6@example.com',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'Robert',
        'Maxime',
        1,
        6
    ),
    (
        7,
        'user7@example.com',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'Richard',
        'François',
        1,
        7
    ),
    (
        8,
        'user8@example.com',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'Lefevre',
        'Julien',
        1,
        8
    ),
    (
        9,
        'user9@example.com',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'Durand',
        'Jérôme',
        1,
        9
    ),
    (
        10,
        'user10@example.com',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'Moreau',
        'Benjamin',
        1,
        10
    ),
    (
        12,
        'dam51@hotmail.fr',
        '$2y$10$NfSuSVCA1VFfffhk/6IX4.vGRlzI9axiV933qvRkksuTNEr1ncFrS',
        'ricard',
        'damien',
        1,
        NULL
    ),
    (
        13,
        'azerty@zoulou.com',
        '$2y$10$DPe9KBhAWVXO01MtMgNhcehBqFhoA2LyaQOzyk.yCT8rWM4xFcGUu',
        'ricard',
        'damien',
        1,
        NULL
    ),
    (
        14,
        'azertyqq@zoulou.com',
        '$2y$10$T/r6.CqkD0F30LJ8om.IFueelp/1BntFnB7TBLV.QUF4MU53ue0jS',
        'ricard',
        'damien',
        1,
        NULL
    );
/*!40000 ALTER TABLE `user` ENABLE KEYS */
;

UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;

-- Dump completed on 2024-06-21 14:58:28