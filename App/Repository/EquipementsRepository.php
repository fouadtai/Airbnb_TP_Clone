<?php

namespace App\Repository;

use Core\Repository\Repository;

class EquipementsRepository extends Repository
{
  public function getTableName(): string
  {
    return 'equipements';
  }
}