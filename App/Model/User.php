<?php

namespace App\Model;

use App\Model\Adress;
use Core\Model\Model;  // Importe la classe Model du namespace Core\Model

// Définition de la classe User qui représente un utilisateur
class User extends Model
{
    // Propriétés publiques de la classe User
    public string $email;      
    public string $password;    
    public string $lastname;    
    public string $firstname;   
    public bool $is_active;     
    public string $is_type;
    public ?int $adress_id;     
    public Adress $adress;    
    
}
