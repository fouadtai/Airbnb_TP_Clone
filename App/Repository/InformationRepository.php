<?php

namespace App\Repository;

use Core\Repository\Repository;

class InformationRepository extends Repository
{
  public function getTableName(): string
  {
    return "informations";
  }
}
