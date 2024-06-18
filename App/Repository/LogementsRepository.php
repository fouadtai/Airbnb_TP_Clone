<?php

namespace App\Repository;

use PDO;
use App\Model\Logement;
use Core\Repository\Repository;

class LogementsRepository extends Repository
{
  private $db;

  public function getTableName(): string
  {
    return 'logements';
  }



  public function getAllLogements(): array
  {
    $array_result = [];

    $q = "
            SELECT 
                l.title, 
                l.price_per_night, 
                t.label AS type
            FROM 
                logements l
            JOIN 
                type t ON l.type_id = t.id
            WHERE 
                l.is_active = 1
        ";

    $stmt = $this->db->query($q);

    if (!$stmt) {
      error_log('Query failed: ' . $this->db->errorInfo()[2]);
      return $array_result;
    }

    while ($row_data = $stmt->fetch(PDO::FETCH_ASSOC)) {
      error_log('Fetched logement: ' . print_r($row_data, true));
      $array_result[] = $row_data; // Assuming $row_data is an associative array
    }

    return $array_result;
  }

  public function getLogementById(int $logement_id): ?Logement
  {
    $q = sprintf(
      'SELECT * FROM %s WHERE `id` = :id AND `is_active` = 1',
      $this->getTableName()
    );

    $stmt = $this->db->prepare($q);

    if (!$stmt) {
      error_log('Query preparation failed: ' . $this->db->errorInfo()[2]);
      return null;
    }

    $stmt->execute(['id' => $logement_id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
      error_log('No logement found with id: ' . $logement_id);
      return null;
    }

    return new Logement($result);
  }
}
