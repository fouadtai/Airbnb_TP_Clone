<?php

namespace App\Repository;

use App\Model\Media;
use Core\Repository\Repository;

class MediaRepository extends Repository
{
    // Méthode pour retourner le nom de la table associée à ce repository
    public function getTableName(): string
    {
        return 'media'; // Retourne le nom de la table
    }

    /**
     * Cette méthode récupère tous les médias associés à un logement spécifique identifié par son ID.
     * Méthode qui récupère tous les médias d'un logement par son ID
     * @param int $logement_id - ID du logement dont on veut récupérer les médias
     * @return array - Tableau d'objets Media associés au logement
     */
    public function getMediaById(int $logement_id): array
    {
        $array_result = []; // Déclaration d'un tableau vide pour stocker les médias récupérés

        // Requête SQL pour récupérer tous les médias d'un logement spécifique
        $q = sprintf(
            'SELECT *
            FROM %s
            WHERE `logement_id` = :id',
            $this->getTableName() // Nom de la table des médias
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Vérification si la préparation de la requête a échoué
        if (!$stmt) {
            return $array_result; // Retourne le tableau vide si la préparation de la requête a échoué
        }

        // Exécution de la requête SQL en passant l'ID du logement comme paramètre
        $stmt->execute(['id' => $logement_id]);

        // Boucle sur les résultats de la requête pour créer des objets Media et les ajouter au tableau $array_result
        while ($row_data = $stmt->fetch()) {
            $array_result[] = new Media($row_data); // Création d'un nouvel objet Media avec les données récupérées
        }

        // Retourne le tableau d'objets Media associés au logement
        return $array_result;
    }





    /**
     * Cette méthode insère un nouveau média dans la base de données en utilisant les données
     *  fournies dans le tableau $media. Elle retourne true si l'insertion réussit, sinon false.
     * Méthode pour insérer un nouveau média dans la base de données
     * @param array $media - Tableau associatif contenant les données du média à insérer
     * @return bool - True si l'insertion a réussi, sinon false
     */
    public function insertMedia(array $media): bool
    {
        // Requête SQL pour insérer un nouveau média avec les champs requis
        $q = sprintf(
            'INSERT INTO %s (`logement_id`, `image_path`) 
            VALUES (:logement_id, :image_path)',
            $this->getTableName() // Nom de la table des médias
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Vérification si la préparation de la requête a échoué
        if (!$stmt) {
            return false; // Retourne false si la préparation de la requête a échoué
        }

        // Exécution de la requête SQL en passant les données à insérer comme paramètres
        return $stmt->execute($media); // Retourne true si l'insertion a réussi, sinon false
    }
}

