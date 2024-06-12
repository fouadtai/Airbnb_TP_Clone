<?php

namespace Core\Controller;

interface ControllerInterface
{
  public static function redirect(
    string $uri,
    int $status = 302,
    array $headers = []
  ): void;
}
