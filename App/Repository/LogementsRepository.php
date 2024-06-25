<?php

namespace App\Repository;

use PDO;
use App\AppRepoManager;
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

    $q = sprintf(
      'SELECT l.`id`, l.`title`, l.`price_per_night`, l.`address` 
            FROM %1$s AS l
            INNER JOIN %2$s AS u ON l.`user_id` = u.`id` 
            WHERE u.`is_admin` = 1 ',
      $this->getTableName(),
      AppRepoManager::getRm()->getUserRepository()->getTableName()
    );

    $stmt = $this->pdo->query($q);
    if (!$stmt) return $array_result;

    while ($row_data = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $array_result[] = new Logement($row_data);
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
