<?php

namespace App\Model;

use Core\Model\Model;  // Importe la classe Model du namespace Core\Model

// Définition de la classe TypeLogement qui représente le type de logement
class TypeLogement extends Model
{
    // Propriétés publiques de la classe TypeLogement
    public string $label;       // Libellé ou nom du type de logement
    public string $image_path;  // Chemin de l'image représentant ce type de logement
    public bool $is_active;     // Indicateur d'activation du type de logement (actif ou non)
}

?>
