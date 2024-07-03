<?php

//Indique que la classe Equipement est dans le namespace App\Model, permettant de l'organiser et de l'utiliser sans conflit avec d'autres classes du même nom dans d'autres namespaces.
namespace App\Model;

use Core\Model\Model;

//Déclare la classe Equipement et spécifie qu'elle étend (hérite) de la classe Model. Cela signifie que la classe Equipement bénéficie des propriétés et méthodes définies dans la classe Model.
// Définition de la classe Equipement qui représente un équipement
class Equipement extends Model
{
    // Propriétés de la classe Equipement
    public string $label;       //Déclare une propriété publique nommée label de type string (chaîne de caractères). Cette propriété est utilisée pour stocker le libellé de l'équipement.. Le libellé de l'équipement sous forme de chaîne de caractères
    public string $image_path;  // Le chemin de l'image de l'équipement sous forme de chaîne de caractères
}

?>
