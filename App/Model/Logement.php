<?php

namespace App\Model;

use App\Model\Adress;
use Core\Model\Model; // Import de la classe Model du namespace Core\Model

// Définition de la classe Logement qui représente un logement
class Logement extends Model
{
    // Propriétés publiques de la classe Logement
    public string $title;              // Le titre du logement sous forme de chaîne de caractères
    public string $description;        // La description du logement sous forme de chaîne de caractères
    public string $price_per_night;    // Le prix par nuit du logement sous forme de chaîne de caractères
    public int $nb_room;               // Le nombre de chambres du logement sous forme d'entier
    public int $nb_bed;                // Le nombre de lits du logement sous forme d'entier
    public int $nb_bath;               // Le nombre de salles de bains du logement sous forme d'entier
    public int $nb_traveler;           // Le nombre de voyageurs du logement sous forme d'entier
    public bool $is_active;            // Statut d'activation du logement sous forme de booléen
    public int $Taille;                // La taille du logement en m² sous forme d'entier

    public int $type_logement_id;      // ID du type de logement associé sous forme d'entier
    public int $user_id;               // ID de l'utilisateur propriétaire du logement sous forme d'entier
    public int $adress_id;             // ID de l'adresse du logement sous forme d'entier

    // Propriétés d'association pour stocker les objets associés
    public User $user;                 // Instance de la classe User représentant l'utilisateur associé
    public TypeLogement $type_logement; // Instance de la classe TypeLogement représentant le type de logement associé
    public Adress $adress;             // Instance de la classe Adress représentant l'adresse associée

    public array $media;              // Tableau des médias associés au logement. Cette propriété est un tableau qui stocke les médias associés au logement, tels que les images ou les vidéos.
    public array $equipements;        // Tableau des equipements associés au logement. Cette propriété est un tableau qui stocke les equipements associés au logement, tels que les machines à laver ou les chaînes à laver.
    public array $reservations;

}

?>
