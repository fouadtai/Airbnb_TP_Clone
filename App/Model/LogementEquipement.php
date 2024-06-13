<?php

namespace App\Model;

use Core\Model\Model;

class LogementEquipment extends Model
{
  public int $logement_id;
  public int $equipment_id;

  public function __construct(array $data = [])
  {
    parent::__construct($data);
  }
}
