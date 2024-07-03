<?php

namespace App\Model;
use Core\Model\Model;

class Favoris extends Model
{
  public int $logement_id;
  public int $user_id;

  public Logement $logement;
  public User $user;
}