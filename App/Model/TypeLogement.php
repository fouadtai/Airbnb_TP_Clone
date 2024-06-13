<?php

namespace App\Model;

use Core\Model\Model;

class Type extends Model
{
  public int $id;
  public string $label;
  public ?string $image_path;
  public bool $is_active;

  public function __construct(array $data = [])
  {
    parent::__construct($data);
  }
}
