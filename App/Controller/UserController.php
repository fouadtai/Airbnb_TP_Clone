<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\View\View;
use Core\Session\Session;

class UserController extends Controller
{
    public function monCompte()
    {
        if (!AuthController::isAuth()) {
            self::redirect('/connexion');
        }

        $view = new View('mon-compte');
        $view->render();
    }
}
