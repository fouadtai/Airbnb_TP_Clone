<?php

namespace App\Repository;

use Core\Repository\Repository;

class LogementEquipementRepository extends Repository
{
  public function getTableName() : string
  {
    return "logement_equipement";
  }
}