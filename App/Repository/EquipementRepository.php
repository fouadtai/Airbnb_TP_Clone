<?php

namespace App\Repository;

use App\Model\Equipement;
use Core\Repository\Repository;

class EquipementRepository extends Repository
{
    // Méthode pour retourner le nom de la table associée à ce repository
    public function getTableName(): string
    {
        return 'equipement'; // Retourne le nom de la table
    }




    /**
     * Méthode pour récupérer tous les équipements actifs rangés par label
     * public function getEquipementActiveBylabel(): array : Cette méthode récupère tous les équipements actifs de la table 'equipement', les trie par label, 
     * et les retourne sous forme d'un tableau associatif.
     * @return array
     */
    public function getEquipementActiveBylabel(): array
    {
        $array_result = []; // Initialisation d'un tableau vide pour stocker les résultats

        // Construction de la requête SQL pour récupérer tous les équipements actifs, triés par label
        $q = sprintf(
            'SELECT * 
            FROM `%s`
            ORDER BY `label` ASC',
            $this->getTableName()
        );

        // Exécution de la requête SQL
        $stmt = $this->pdo->query($q);

        // Vérification que la requête s'est bien exécutée
        if (!$stmt) {
            return $array_result; // Retourne le tableau vide si la requête a échoué
        }

        // Boucle pour parcourir les résultats de la requête et les stocker dans $array_result
        while ($row_data = $stmt->fetch()) {
            // Création d'une clé dans $array_result basée sur le label de l'équipement
            // Ajout d'un nouvel objet Equipement dans cette clé, avec les données de la ligne courante
            $array_result[$row_data['label']][] = new Equipement($row_data);
        }

        return $array_result; // Retourne le tableau associatif contenant les équipements par label
    }





}