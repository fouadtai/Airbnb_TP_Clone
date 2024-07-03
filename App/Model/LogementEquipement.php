<?php

namespace App\Model;

use Core\Model\Model; // Import de la classe Model du namespace Core\Model

// Définition de la classe LogementEquipement qui représente la relation entre un logement et un équipement
class LogementEquipement extends Model
{
    // Propriétés publiques de la classe LogementEquipement
    public int $logement_id;       // ID du logement lié sous forme d'entier
    public int $equipement_id;     // ID de l'équipement lié sous forme d'entier

    // Propriétés d'association pour stocker les objets associés
    public Logement $logement;     // Instance de la classe Logement représentant le logement associé
    public Equipement $equipement; // Instance de la classe Equipement représentant l'équipement associé
}

?>
