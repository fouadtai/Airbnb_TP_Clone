<?php

namespace App\Model;

use Core\Model\Model;

class Reservation extends Model
{
  public int $id;
  public string $date_start;
  public string $date_end;
  public int $nb_adult;
  public int $nb_child;
  public float $price_total;
  public int $logement_id;
  public int $user_id;

  public function __construct(array $data = [])
  {
    parent::__construct($data);
  }
}
