<?php

namespace App\Repository;

use Core\Repository\Repository;

class MediaRepository extends Repository
{
  public function getTableName() : string
  {
    return "media";
  }
}