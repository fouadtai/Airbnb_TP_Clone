<?php

namespace App\Model;

use DateTime;            // Importe la classe DateTime pour la gestion des dates
use App\Model\User;      // Importe la classe User du namespace App\Model
use Core\Model\Model;    // Importe la classe Model du namespace Core\Model
use App\Model\Logement;  // Importe la classe Logement du namespace App\Model

// Définition de la classe Reservation qui représente une réservation effectuée par un utilisateur pour un logement
class Reservation extends Model
{
    // Propriétés publiques de la classe Reservation
    public string $date_start;    // Date de début de la réservation sous forme de chaîne de caractères
    public string $date_end;      // Date de fin de la réservation sous forme de chaîne de caractères
    public ?int $nb_adult;        // Nombre d'adultes pour la réservation (peut être nul)
    public ?int $nb_child;        // Nombre d'enfants pour la réservation (peut être nul)
    public int $price_total;      // Prix total de la réservation en euros
    public ?int $logement_id;     // ID du logement réservé (peut être nul)
    public int $user_id;          // ID de l'utilisateur effectuant la réservation

    // Propriétés d'association pour stocker les objets associés à cette réservation
    public Logement $logement;    // Propriété utilisée pour stocker l'objet Logement associé à cette réservation.
                                  // Elle est typée avec la classe Logement, permettant d'accéder aux détails du logement réservé. Instance de la classe Logement représentant le logement réservé
    public User $user;            // Instance de la classe User représentant l'utilisateur effectuant la réservation
}


//La classe Reservation est utilisée pour représenter une réservation dans l'application. 
//Elle permet de gérer et de manipuler les informations relatives à une réservation spécifique, y compris les dates, les nombres d'adultes/enfants, le prix total, ainsi que les associations avec un utilisateur et un logement.
?>
