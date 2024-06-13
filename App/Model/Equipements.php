<?php

namespace App\Model;

use Core\Model\Model;

class Equipment extends Model
{
  public int $id;
  public string $label;
  public ?string $image_path;

  public function __construct(array $data = [])
  {
    parent::__construct($data);
  }
}
