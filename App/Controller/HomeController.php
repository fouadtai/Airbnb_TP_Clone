<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\View\View;

class HomeController extends Controller 
{
    /**
     * Méthode qui affiche la vue de la page d'accueil.
     */
    public function home()
    {
        // Création d'une instance de View pour charger la vue 'home/index'
        $view = new View('home/index');

        // Rendu de la vue
        $view->render();
    }
}
