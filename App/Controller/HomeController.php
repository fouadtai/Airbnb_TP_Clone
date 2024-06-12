<?php 

namespace App\Controller;

use Core\Controller\Controller;
use Core\View\View;

class HomeController extends Controller 
{
  public function home()
  {
    $view = new View('home/index');

    $view->render();
  }
}