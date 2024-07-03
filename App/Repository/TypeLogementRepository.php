<?php

namespace App\Repository;

use App\AppRepoManager;
use App\Model\TypeLogement;
use Core\Repository\Repository;

class TypeLogementRepository extends Repository
{
    /**
     * Méthode pour retourner le nom de la table associée à ce repository
     * @return string - Nom de la table des types de logement
     */
    public function getTableName(): string
    {
        return 'type_logement'; // Retourne le nom de la table des types de logement
    }

    /**
     * Méthode qui récupère le type de logement par son ID
     * @param int $logement_id - ID du logement dont on veut récupérer le type
     * @return ?TypeLogement - Objet TypeLogement ou null si aucun résultat trouvé
     */
    public function getTypeLogementByLogementId($logement_id): ?TypeLogement
    {
        // Requête SQL pour récupérer le type de logement par son ID
        $q = sprintf(
            ' SELECT *
            FROM %s 
            WHERE id = :id',
            $this->getTableName() // Nom de la table des types de logement
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
            return null; // Retourne null si aucun résultat trouvé
        }

        // Retourne un nouvel objet TypeLogement avec les données récupérées
        return new TypeLogement($result);
    }

    /**
     * Cette méthode récupère tous les types de logement actifs dans la base de données. Elle retourne un tableau d'objets TypeLogement.
     * Méthode qui récupère tous les types de logement actifs
     * @return array - Tableau d'objets TypeLogement
     */
    public function getAllTypes()
    {
        $array_result = []; // Déclaration d'un tableau vide pour stocker les types de logement récupérés

        // Requête SQL pour récupérer tous les types de logement actifs
        $q = sprintf(
            'SELECT *
            FROM %s WHERE is_active=1',
            $this->getTableName() // Nom de la table des types de logement
        );

        // Exécution de la requête SQL
        $stmt = $this->pdo->query($q);

        // Vérification si l'exécution de la requête a échoué
        if (!$stmt) {
            return $array_result; // Retourne le tableau vide si l'exécution de la requête a échoué
        }

        // Boucle sur les résultats de la requête pour créer des objets TypeLogement et les ajouter au tableau $array_result
        while ($row_data = $stmt->fetch()) {
            $type = new TypeLogement($row_data); // Création d'un nouvel objet TypeLogement avec les données récupérées
            $array_result[] = $type; // Ajout du type de logement au tableau $array_result
        }

        // Retourne le tableau d'objets TypeLogement
        return $array_result;
    }
}
