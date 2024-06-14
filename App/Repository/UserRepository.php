<?php

namespace App\Repository;

use App\Model\User;
use Core\Repository\Repository;

class UserRepository extends Repository
{
  public function getTableName(): string
  {
    return "user";
  }

  /**
   * méthode pour ajouter un utilisateur
   * 
   */
  public function addUser(array $data): ?User
  {
    //on crée un tableau pour que le client ne soit pas admin et soit actif
    $data_more = [
      'is_admin' => 0,
      'is_active' => 1
    ];
    //on fusionne les 2 tableaux
    $data = array_merge($data, $data_more);

    //on crée la requete SQL
    $query = sprintf(
      'INSERT INTO %s (`email`, `password`, `firstname`, `lastname`, `phone`, `is_admin`, `is_active`) 
      VALUES (:email, :password, :firstname, :lastname, :phone,  :is_admin, :is_active)',
      $this->getTableName()
    );
    //on prépare la requete
    $stmt = $this->pdo->prepare($query);
    //on vérifie que la requete est bien préparée
    if (!$stmt) return null;
    //on execute en passant les valeurs
    $stmt->execute($data);

    //on récupère l'id de l'utilisateur fraichement créée
    $id = $this->pdo->lastInsertId();
    //on peut retourner l'objet User grace à son id
    return $this->readById(User::class, $id);
  }

  /**
   * méthode qui recupère un utilisateur par son email
   * @param string $email
   * @return User|null
   */
  public function findUserByEmail(string $email): ?User
  {
    //on crée notre requete SQL
    $q = sprintf('SELECT * FROM %s WHERE email = :email', $this->getTableName());
    //on prépare la requete
    $stmt = $this->pdo->prepare($q);
    //on vérifie que la requete est bien bien préparée
    if (!$stmt) return null;
    //si tout est bon, on bind les valeurs
    $stmt->execute(['email' => $email]);
    while ($result = $stmt->fetch()) {
      $user = new User($result);
    }
    return $user ?? null;
  }
}
