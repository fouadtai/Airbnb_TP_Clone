<?php

namespace App\Repository;

use Core\Repository\Repository;

class TypeLogementRepository extends Repository
{
  public function getTableName(): string
  {
    return 'typelogement';
  }
}