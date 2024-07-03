<?php

namespace App\Repository;

use App\AppRepoManager;
use App\Model\Equipement;
use Core\Repository\Repository;

class LogementEquipementRepository extends Repository
{
    // Méthode pour retourner le nom de la table associée à ce repository
    public function getTableName(): string
    {
        return 'logement_equipement'; // Retourne le nom de la table
    }

    /**
     * Méthode qui permet d'insérer des équipements via la table LogementEquipement
     * @param array $data - Les données à insérer dans la table (logement_id, equipement_id)
     * @return bool - True si l'insertion a réussi, sinon False
     */
    public function addEquipementByLogementEquipement(array $data)
    {
        // Construction de la requête SQL d'insertion
        $q = sprintf(
            "INSERT INTO %s (logement_id, equipement_id) 
            VALUES (:logement_id, :equipement_id)",
            $this->getTableName()
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Vérification si la préparation de la requête a réussi
        if (!$stmt) {
            return false; // Retourne False si la préparation a échoué
        }

        // Exécution de la requête en liant les paramètres avec les valeurs fournies dans $data
        $stmt->execute($data);

        // Vérification si au moins une ligne a été insérée dans la table
        //rowCount() : Méthode PDO qui retourne le nombre de lignes affectées par la dernière requête SQL exécutée.
        return $stmt->rowCount() > 0; // Retourne True si au moins une ligne a été insérée, sinon False
    }


    /**
     * méthode qui permet de récupérer les équipements pour chaque logement
     * @param int $id_logement - ID du logement dont on veut les equipements
     * @return array - Tableau d'objets Equipement associés au logement
     */
    public function getEquipementByLogementId(int $id_logement): array
    {
        $array_result = []; // Initialise un tableau vide pour stocker les resultats

        // Construction de la requête SQL pour sélectionner tous les equipements pour un logement
        $q = sprintf(
            'SELECT e.*
            FROM %1$s AS le 
            INNER JOIN %2$s AS e ON le.equipement_id = e.id
            WHERE le.`logement_id` = :id_logement',
            $this->getTableName(),
            AppRepoManager::getRm()->getEquipementRepository()->getTableName()
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Verification si la requête a echouée
        if (!$stmt) {
            return $array_result;
        }

        // Exécution de la requête SQL avec les paramètres de la requête
        $stmt->execute(['id_logement' => $id_logement]);

        // Boucle pour parcourir les resultats de la requête et les stocker dans $array_result
        while ($row_data = $stmt->fetch()) {
            $array_result[] = new Equipement($row_data);
        }

        return $array_result;
    }
}



//Cette classe LogementEquipementRepository est utilisée pour gérer les opérations liées à la table 'logement_equipement',
// notamment l'insertion d'associations entre logements et équipements dans la base de données.
