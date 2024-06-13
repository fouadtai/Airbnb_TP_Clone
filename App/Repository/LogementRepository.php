<?php

namespace App\Repository;

use Core\Repository\Repository;

class LogementRepository extends Repository
{
  public function getTableName() : string
  {
    return "logement";
  }
}