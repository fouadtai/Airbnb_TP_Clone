<?php

namespace App\Controller;

use App\AppRepoManager;
use Core\Controller\Controller;
use Core\View\View;

class LogementController extends Controller
{


    /**
     * méthode qui renvoie la vue de la page d'accueil
     * @return void
     */
    public function home()
    {
        //preparation des données à transmettre à la vue


        $view = new View('home/home');
        $view->render();
    }


    public function getLogements(): void
    {
        $logements = AppRepoManager::getRm()->getLogementsRepository()->getAllLogements();
        $view_data = [
            'h1' => 'Our Properties',
            'logements' => $logements
        ];

        $view = new View('home/logements');
        $view->render($view_data);
    }

    public function getLogementById(int $id): void
    {
        $logement = AppRepoManager::getRm()->getLogementsRepository()->getLogementById($id);
        $view_data = [
            'logement' => $logement,
        ];

        $view = new View('home/logement_detail');
        $view->render($view_data);
    }

    public function addLogement(): void
    {
        // Add logic to add logement
    }
}
