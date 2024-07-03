<?php
//Indique que la classe Address est dans le namespace App\Model, permettant de l'organiser et de l'utiliser sans conflit avec d'autres classes du même nom dans d'autres namespaces
namespace App\Model;

//Importe la classe Model du namespace Core\Model, ce qui permet à la classe Address d'hériter des fonctionnalités de la classe Model.
use Core\Model\Model;

// Définition de la classe Address qui représente une adresse
//Déclare la classe Address et spécifie qu'elle étend (hérite) de la classe Model. Cela signifie que la classe Address 
//bénéficie des propriétés et méthodes définies dans la classe Model.
class Adress extends Model
{
    // Propriétés de la classe Address
    public string $address; // L'adresse sous forme de chaîne de caractères. Déclare une propriété publique nommée address de type string (chaîne de caractères). Cette propriété est destinée à stocker l'adresse.
    public int $zip_code;   // Le code postal sous forme d'entier
    public string $city;    // La ville sous forme de chaîne de caractères
    public string $country; // Le pays sous forme de chaîne de caractères
    public string $phone;   // Le numéro de téléphone sous forme de chaîne de caractères
}
?>
