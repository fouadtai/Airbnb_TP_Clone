<?php

namespace App\Repository;

use Core\Repository\Repository;

//La classe AdressRepository étend la classe abstraite Repository, 
//ce qui signifie qu'elle hérite de ses méthodes et propriétés et peut les spécialiser selon ses besoins.
class AdressRepository extends Repository
{
    // Méthode pour retourner le nom de la table associée à ce repository
    public function getTableName(): string
    {
        return 'adress'; // Retourne le nom de la table
    }

    //Cette méthode prend un tableau $data contenant les données à insérer dans la table 'adress'.
    // Méthode pour insérer une adresse dans la base de données
    public function insertAdress(array $data): ?int
    {
        // Construction de la requête SQL d'insertion en utilisant sprintf pour insérer les données de manière sécurisée
        $q = sprintf(
            'INSERT INTO `%s` (`adress`, `country`, `zip_code`, `phone`, `city`)
            VALUES (:adress, :country, :zip_code, :phone, :city)',
            $this->getTableName()
        );

        // La requête est préparée avec $this->pdo->prepare($q) pour éviter les injections SQL.
        $stmt = $this->pdo->prepare($q);

        // Vérification que la préparation de la requête s'est bien déroulée
        if (!$stmt) {
            return null; // Retourne null si la préparation a échoué
        }

        // Exécution de la requête en passant les données en paramètres
        $stmt->execute($data);

        //La méthode retourne l'identifiant (id) de la dernière ligne insérée dans la table 'adress' en utilisant $this->pdo->lastInsertId().
        return $this->pdo->lastInsertId();
    }
}



//Cette classe AdressRepository sert donc à gérer les opérations liées à la table adress dans la base de données, 
//en fournissant des méthodes pour récupérer le nom de la table et insérer des données dans cette table de manière sécurisée.