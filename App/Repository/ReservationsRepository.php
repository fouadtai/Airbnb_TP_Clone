<?php

namespace App\Repository;

use Core\Repository\Repository;

class ReservationsRepository extends Repository
{
  public function getTableName(): string
  {
    return 'reservations';
  }
}