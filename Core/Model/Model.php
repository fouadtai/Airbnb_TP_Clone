<?php 

namespace Core\Model;

class Model 
{
  public int $id;

  public function __construct(array $data_row = []) {
    //si on a des données, on les injecte dans l'objet
    foreach($data_row as $column => $value){
      //si la propriété existe pas, on passe à la suivante
      if(!property_exists($this, $column)) continue;

      //sinon on injecte la valeur dans la propriété
      $this->$column = $value;
    }
  }
}