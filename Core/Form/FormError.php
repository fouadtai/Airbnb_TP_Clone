<?php

namespace Core\Form;

class FormError
{
  public function __construct(private string $message, private string $field_name = '')
  {
  }

  public function getMessage(): string
  {
    return $this->message;
  }

  public function getFieldName(): string
  {
    return $this->field_name;
  }
}
