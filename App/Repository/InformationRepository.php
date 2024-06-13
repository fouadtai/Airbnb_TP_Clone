<?php

namespace App\Repository;

use Core\Repository\Repository;

class AddressRepository extends Repository
{
  public function getTableName(): string
  {
    return "address";
  }
}
