<?php

namespace App\Model;

use Core\Model\Model;

class Address extends Model
{
  public int $id;
  public string $address;
  public string $zip_code;
  public string $city;
  public string $country;

  public function __construct(array $data = [])
  {
    parent::__construct($data);
  }
}
