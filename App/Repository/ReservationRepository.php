<?php

namespace App\Repository;

use App\Model\Logement;
use Core\View\View;
use App\Model\Reservation;
use Core\Repository\Repository;

class ReservationRepository extends Repository
{
    // Méthode pour retourner le nom de la table associée à ce repository
    public function getTableName(): string
    {
        return 'reservation'; // Retourne le nom de la table
    }

    /**
     * Cette méthode insère une nouvelle réservation dans la base de données en utilisant les données fournies dans le tableau $data.
     * Méthode pour insérer une nouvelle réservation dans la base de données
     * @param array $data - Tableau associatif contenant les données de la réservation à insérer
     */
    public function insertReservation(array $data)
    {
        // Requête SQL pour insérer une nouvelle réservation avec les champs requis
        $q = sprintf(
            "INSERT INTO %s (`price_total`,`date_start`, `date_end`, `user_id`, `nb_adult`, `nb_child`, `logement_id`) 
            VALUES (:price_total, :date_start, :date_end, :user_id, :nb_adult, :nb_child, :logement_id)",
            $this->getTableName() // Nom de la table des réservations
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Vérification si la préparation de la requête a échoué
        if (!$stmt) {
            return false; // Retourne false si la préparation de la requête a échoué
        }

        // Exécution de la requête SQL en passant les données à insérer comme paramètres
        $stmt->execute($data);
    }

    /**
     * Cette méthode récupère toutes les réservations associées à un utilisateur spécifique identifié par son ID. 
     * Elle retourne un tableau d'objets Reservation.
     * Méthode qui récupère toutes les réservations d'un utilisateur par son ID
     * @param int $id - ID de l'utilisateur dont on veut récupérer les réservations
     * @return array - Tableau d'objets Reservation associés à l'utilisateur
     */
    public function ReservationsByUserId(int $id): array
    {
        $array_result = []; // Déclaration d'un tableau vide pour stocker les réservations récupérées

        // Requête SQL pour récupérer toutes les réservations d'un utilisateur spécifique
        $q = sprintf(
            'SELECT *
            FROM %s
            WHERE `user_id` = :id',
            $this->getTableName() // Nom de la table des réservations
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Vérification si la préparation de la requête a échoué
        if (!$stmt) {
            return $array_result; // Retourne le tableau vide si la préparation de la requête a échoué
        }

        // Exécution de la requête SQL en passant l'ID de l'utilisateur comme paramètre
        $stmt->execute(['id' => $id]);

        // Boucle sur les résultats de la requête pour créer des objets Reservation et les ajouter au tableau $array_result
        while ($row_data = $stmt->fetch()) {
            $reservation = new Reservation($row_data); // Création d'un nouvel objet Reservation avec les données récupérées
            $array_result[] = $reservation; // Ajout de la réservation au tableau $array_result
        }

        // Retourne le tableau d'objets Reservation associés à l'utilisateur
        return $array_result;
    }




    /**
     * Cette méthode récupère toutes les réservations associées à un logement spécifique identifié par son ID. 
     * Elle retourne un tableau d'objets Reservation.
     * Méthode qui récupère toutes les réservations par ID du logement
     * @param int $id - ID du logement dont on veut récupérer les réservations
     * @return array - Tableau d'objets Reservation associés au logement concerné
     */
    public function getReservationsByLogementId(int $id): array
    {
        $array_result = []; // Déclaration d'un tableau vide pour stocker les réservations récupérées

        // Requête SQL pour récupérer toutes les réservations liées à un logement spécifique
        $q = sprintf(
            'SELECT *
            FROM %s
            WHERE `logement_id` = :id',
            $this->getTableName() 
        );
        

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Vérification si la préparation de la requête a échoué
        if (!$stmt) {
            return $array_result; // Retourne le tableau vide si la préparation de la requête a échoué
        }

        // Exécution de la requête SQL en passant l'ID de l'utilisateur comme paramètre
        $stmt->execute(['id' => $id]);

        // Boucle sur les résultats de la requête pour créer des objets Reservation et les ajouter au tableau $array_result
        while ($row_data = $stmt->fetch()) {
            $reservation = new Reservation($row_data); // Création d'un nouvel objet Reservation avec les données récupérées
            $array_result[] = $reservation; // Ajout de la réservation au tableau $array_result
        }
     

        // Retourne le tableau d'objets Reservation associé à l'utilisateur
        return $array_result;
    }



    /**
     * Supprime une réservation
     * @param int $reservation_id
     * @return bool
     */
    public function deleteReservation(int $reservation_id): bool
    {
        $q = sprintf(
            'DELETE FROM `%s` 
            WHERE id = :id',
            $this->getTableName()
        );

        //on prépare la requête
        $stmt = $this->pdo->prepare($q);
        if (!$stmt) return false;

        //on vérifie si s'est bien bien executer
        return $stmt->execute(['id' => $reservation_id]);
    }
}

