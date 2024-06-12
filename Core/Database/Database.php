<?php  

namespace Core\Database;

use PDO;
//SINGLETON PATTERN
class Database 
{
  //on crée une constante avec les options de PDO
  //ici on veut que les données soient retournées sous forme de tableau associatif
  private const PDO_OPTIONS = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];

  //on crée une propriété privée et statique pour stocker l'instance de PDO
  private static ?PDO $pdoInstance = null;

  //on crée une méthode statique en public pour récupérer l'instance de PDO
  public static function getPDO( DatabaseConfigInterface $config): PDO
  {
    //si l'instance de PDO n'existe pas, on la crée
    if(is_null(self::$pdoInstance)){
      $dsn = sprintf('mysql:dbname=%s;host=%s', $config->getName(), $config->getHost());
      self::$pdoInstance = new PDO(
        $dsn, 
        $config->getUser(), 
        $config->getPass(), 
        self::PDO_OPTIONS
      );
    }
    //on retourne l'instance de PDO
    return self::$pdoInstance;
  }

  //le construct en private pour empêcher l'instanciation de la classe
  private function __construct(){}
  //le clone en private pour empêcher le clonage de l'instance
  private function __clone(){}
}