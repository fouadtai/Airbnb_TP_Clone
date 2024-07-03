<?php

namespace App\Repository;

use App\Model\User;
use Core\View\View;
use Core\Repository\Repository;

class UserRepository extends Repository
{
    /**
     * Méthode pour retourner le nom de la table associée à ce repository
     * @return string - Nom de la table des utilisateurs
     */
    public function getTableName(): string
    {
        return 'user'; // Retourne le nom de la table des utilisateurs
    }

    /**
     * Méthode pour ajouter un utilisateur dans la base de données
     * @param array $data - Données de l'utilisateur à ajouter
     * @return User|null - L'utilisateur ajouté ou null en cas d'échec
     */
    public function addUser(array $data): ?User
    {
        // Ajout de valeurs par défaut pour certaines données de l'utilisateur
        $data_more = [
            'is_active' => 1, // Par défaut, l'utilisateur est actif
        ];

        // Fusion des données fournies avec les valeurs par défaut
        $data = array_merge($data, $data_more);

        // Requête SQL pour insérer un nouvel utilisateur (chaque fois qu'il y a des paramètres dynamiques!)
        $query = sprintf(
            'INSERT INTO %s (`email`, `password`, `firstname`, `lastname`, `is_active`) 
            VALUES (:email, :password, :firstname, :lastname, :is_active)',
            $this->getTableName()
        );

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($query);

        // Vérification si la préparation de la requête a échoué
        if (!$stmt) {
            return null; // Retourne null si la préparation de la requête a échoué
        }

        // Exécution de la requête SQL en passant les paramètres
        $stmt->execute($data);

        // Récupération de l'ID de l'utilisateur fraîchement inséré
        $id = $this->pdo->lastInsertId();

        // Retourne l'objet User en utilisant son ID
        return $this->readById(User::class, $id);
    }

    /**
     * Méthode pour trouver un utilisateur par son adresse email
     * @param string $email - Adresse email de l'utilisateur à rechercher
     * @return User|null - L'utilisateur trouvé ou null si aucun résultat
     */
    public function findUserByEmail(string $email): ?User
    {
        // Requête SQL pour rechercher un utilisateur par son adresse email
        $q = sprintf('SELECT * FROM %s WHERE email = :email', $this->getTableName());

        // Préparation de la requête SQL
        $stmt = $this->pdo->prepare($q);

        // Vérification si la préparation de la requête a échoué
        if (!$stmt) {
            return null; // Retourne null si la préparation de la requête a échoué
        }

        // Exécution de la requête SQL en passant l'email comme paramètre
        $stmt->execute(['email' => $email]);

        // Récupération du résultat de la requête sous forme de tableau associatif
        $result = $stmt->fetch();

        // Vérification si aucun résultat n'a été trouvé
        if (!$result) {
            return null; // Retourne null si aucun résultat trouvé
        }

        // Création d'un objet User avec les données récupérées
        return new User($result);
    }



    
}

?>
