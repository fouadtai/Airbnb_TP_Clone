<?php

namespace App\Model;

use Core\Model\Model; // Import de la classe Model du namespace Core\Model

// Définition de la classe Media qui représente les médias associés à un logement
class Media extends Model
{
    // Propriétés publiques de la classe Media
    
    public string $image_path;    // Chemin vers l'image du média sous forme de chaîne de caractères
    
    public int $logement_id;      // Propriété représentant l'ID du logement auquel ce média est associé, typée en entier.. ID du logement auquel ce média est associé sous forme d'entier

    // Propriété d'association pour stocker l'objet Logement associé à ce média
    public Logement $logement;    // Instance de la classe Logement représentant le logement associé à ce média
}

//La classe Media est utilisée pour représenter les médias associés à un logement spécifique.
// Elle permet de gérer et de manipuler les informations relatives à ces médias dans l'application.

?>
