<?php 

namespace Core\Controller;

use App\App;
use Laminas\Diactoros\Response\RedirectResponse;

class Controller  implements ControllerInterface
{
  public static function redirect(string $uri, int $status = 302, array $headers = []):void
  {
    $response = new RedirectResponse($uri, $status, $headers);
    App::getApp()->getRouter()->getPublisher()->publish($response);
    die();
  }
}