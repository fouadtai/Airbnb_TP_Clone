<?php

namespace App\Model;

use App\Model\Adress;
use Core\Model\Model;  // Importe la classe Model du namespace Core\Model

// Définition de la classe User qui représente un utilisateur
class User extends Model
{
    // Propriétés publiques de la classe User
    public string $email;       // Adresse email de l'utilisateur
    public string $password;    // Mot de passe de l'utilisateur
    public string $lastname;    // Nom de famille de l'utilisateur
    public string $firstname;   // Prénom de l'utilisateur
    public bool $is_active;     // Indicateur d'activation de l'utilisateur (actif ou non)
    public ?int $adress_id;     // ID de l'adresse de l'utilisateur (peut être null)

    public Adress $adress;      // Propriété d'association représentant l'adresse de l'utilisateur
}

?>
