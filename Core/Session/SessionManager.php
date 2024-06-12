<?php 

namespace Core\Session;

abstract class SessionManager
{
  /**
   * méthode qui alimente notre session
   * @param string $key
   * @param mixed $value
   * @return void
   */
  public static function set(string $key, mixed $value):void
  {
    $_SESSION[$key] = $value;
  }

  /**
   * méthode qui récupère une valeur de la session
   * @param string $key
   * @return mixed
   */
  public static function get(string $key): mixed 
  {
    if(!isset($_SESSION[$key])) return null;
    return $_SESSION[$key];
  }

  /**
   * méthode qui supprime une valeur de la session
   * @param string $key
   * @return void
   */
  public static function remove(string $key): void 
  {
    if(!self::get($key)) return;
    
    unset($_SESSION[$key]);
  }
}