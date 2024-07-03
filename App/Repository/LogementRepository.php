<?php

namespace App\Repository;

use App\Model\User;
use App\Model\Adress;
use App\AppRepoManager;
use App\Model\Logement;
use Core\Repository\Repository;

class LogementRepository extends Repository
{
    // Méthode pour retourner le nom de la table associée à ce repository
    public function getTableName(): string
    {
        return 'logement'; // Retourne le nom de la table
    }

    /**
     * Méthode qui récupère tous les logements actifs avec leurs médias associés
     * @return array - Tableau d'objets Logement
     */
    public function getAllLogements(): array
    {
        $array_result = []; // Déclaration d'un tableau vide pour stocker les logements récupérés

        // Requête SQL pour récupérer les logements actifs avec leurs images associées
        $query = sprintf(
            'SELECT l.id, l.title, l.price_per_night, l.taille, m.image_path
            FROM %1$s AS l
            INNER JOIN %2$s AS m ON l.`id` = m.`logement_id`
            WHERE l.`is_active` = 1',
            $this->getTableName(), // Nom de la table des logements
            AppRepoManager::getRm()->getMediaRepository()->getTableName() // Nom de la table des médias récupéré via le gestionnaire de repository
        );

        // Exécution de la requête SQL
        $stmt = $this->pdo->query($query);

        // Vérification si la requête a réussi
        if (!$stmt) {
            return $array_result; // Retourne le tableau vide si la requête a échoué
        }

        // Boucle sur les résultats de la requête pour créer des objets Logement et les ajouter au tableau $array_result
        while ($row_data = $stmt->fetch()) {
            $logement = new Logement($row_data); // Création d'un nouvel objet Logement avec les données récupérées
            $logement->media[] = $row_data['image_path']; // Ajout du chemin de l'image au tableau medias de l'objet Logement
            $array_result[] = $logement; // Ajout de l'objet Logement au tableau $array_result
        }

        return $array_result; // Retourne le tableau de logements avec médias associés
    }

    /**
     * Cette méthode récupère un logement spécifique par son ID
     *  avec tous ses détails (y compris le type de logement et les médias associés).
     * Méthode qui récupère un logement par son ID avec ses détails complets (type, médias)
     * @param int $logement_id - ID du logement à récupérer
     * @return ?Logement - Objet Logement ou null si aucun logement trouvé
     */
    public function getLogementById(int $logement_id): ?Logement
    {
        // Requête SQL pour récupérer un logement par son ID
        $q = sprintf(
            'SELECT * FROM %s WHERE `id` = :id', // Requête avec un paramètre :id pour l'ID du logement
            $this->getTableName() // Nom de la table des logements
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Vérification si la préparation de la requête a échoué
        if (!$stmt) {
            return null; // Retourne null si la préparation de la requête a échoué
        }

        // Exécution de la requête SQL en passant l'ID du logement comme paramètre
        $stmt->execute(['id' => $logement_id]);

        // Récupération du résultat de la requête sous forme de tableau associatif
        $result = $stmt->fetch();

        // Vérification si aucun résultat n'a été trouvé
        if (!$result) {
            return null; // Retourne null si aucun résultat trouvé pour cet ID
        }

        // Création d'un objet Logement à partir des données récupérées
        $logement = new Logement($result);

        // Hydratation du type de logement dans l'objet Logement en utilisant son ID de type de logement
        $logement->type_logement = AppRepoManager::getRm()->getTypeLogementRepository()->getTypeLogementByLogementId($logement->type_logement_id);

        // Récupération des médias associés à ce logement et assignation au tableau medias de l'objet Logement
        $logement->media = AppRepoManager::getRm()->getMediaRepository()->getMediaById($logement->id);

        $logement->equipements = AppRepoManager::getRm()->getLogementEquipementRepository()->getEquipementByLogementId($logement->id);

        $logement->adress = AppRepoManager::getRm()->getAdressRepository()->readById(Adress::class , $logement->adress_id);

        $logement->user = AppRepoManager::getRm()->getUserRepository()->readById(User::class, $logement->user_id);

        // Retourne l'objet Logement complet avec type de logement et médias
        return $logement;
    }

    /**
     * Cette méthode insère un nouveau logement dans la base de données en utilisant les données fournies dans le tableau $data.
     * Méthode pour insérer un nouveau logement dans la base de données
     * @param array $data - Données du logement à insérer
     * @return mixed - ID du nouveau logement inséré ou false si l'insertion a échoué
     */
    public function insertLogement(array $data)
    {
        // Requête SQL pour insérer un nouveau logement avec les champs requis
        $q = sprintf(
            "INSERT INTO %s 
            (
                user_id, 
                price_per_night, 
                nb_room, 
                nb_bed, 
                nb_bath, 
                nb_traveler, 
                Taille, 
                description,
                title,
                is_active,
                type_logement_id,
                adress_id)
            VALUES (
                :user_id, 
                :price_per_night,
                :nb_room,
                :nb_bed,
                :nb_bath,
                :nb_traveler,
                :Taille,
                :description,
                :title,
                :is_active,
                :type_logement_id,
                :adress_id)
            ",
            $this->getTableName() // Nom de la table des logements
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Vérification si la préparation de la requête a échoué
        if (!$stmt) {
            return false; // Retourne false si la préparation de la requête a échoué
        }

        // Exécution de la requête SQL en passant les données à insérer comme paramètres
        $stmt->execute($data);

        // Retourne l'ID du dernier logement inséré dans la base de données
        return $this->pdo->lastInsertId();
    }



    /**
     * Méthode pour récupérer tous les logements d'un utilisateur par son ID
     * @param int $user_id - ID de l'utilisateur dont on veut récupérer les logements
     * @return array - Tableau d'objets Logement associés à l'utilisateur
     */
    public function LogementsByUserId(int $user_id)
    {
        // Requête SQL pour récupérer tous les logements d'un utilisateur par son ID
        $q = sprintf(
            "SELECT * FROM %s WHERE `user_id` = :user_id",
            $this->getTableName(), // Nom de la table des logements
          
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Exécution de la requête SQL en passant l'ID de l'utilisateur comme paramètre
        $stmt->execute(['user_id' => $user_id]);

        // Récupération de tous les résultats de la requête sous forme de tableau
        $result = $stmt->fetchAll();

        $array_result = []; // Déclaration d'un tableau vide pour stocker les logements récupérés

        // Boucle sur les résultats pour créer des objets Logement et les ajouter au tableau $array_result
        foreach ($result as $row_data) {
            $logement = new Logement($row_data); // Création d'un nouvel objet Logement avec les données récupérées
            $logement->media =   AppRepoManager::getRm()->getMediaRepository()->getMediaById($logement->id);
            $array_result[] = $logement; // Ajout de l'objet Logement au tableau $array_result
        }

        return $array_result; // Retourne le tableau de logements associés à l'utilisateur
    }


    /**
     * Methode qui permet à l'hôte de voir ses biens qui sont loués
     */
    public function myReservationsByHostId(int $user_id)
    {
        // Requête SQL pour récupérer tous les logements d'un utilisateur par son ID
        $q = sprintf(
            "SELECT * FROM %s WHERE `user_id` = :user_id",
            $this->getTableName(), // Nom de la table des logements
          
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Exécution de la requête SQL en passant l'ID de l'utilisateur comme paramètre
        $stmt->execute(['user_id' => $user_id]);

        // Récupération de tous les résultats de la requête sous forme de tableau
        $result = $stmt->fetchAll();

        $array_result = []; // Déclaration d'un tableau vide pour stocker les logements récupérés

        // Boucle sur les résultats pour créer des objets Logement et les ajouter au tableau $array_result
        foreach ($result as $row_data) {
            $logement = new Logement($row_data); // Création d'un nouvel objet Logement avec les données récupérées
            $logement->media =   AppRepoManager::getRm()->getMediaRepository()->getMediaById($logement->id);
            $logement->reservations  = AppRepoManager::getRm()->getReservationRepository()->getReservationsByLogementId($logement->id);
            $array_result[] = $logement; // Ajout de l'objet Logement au tableau $array_result
        }
       
        return $array_result; // Retourne le tableau de logements associés à l'utilisateur
    }
}

