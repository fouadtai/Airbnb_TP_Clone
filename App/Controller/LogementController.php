<?php

namespace App\Controller;

use Core\View\View;
use App\AppRepoManager;
use Core\Form\FormResult;
use Core\Session\Session;
use Core\Controller\Controller;
use Core\Form\FormError;
use Core\Form\FormSuccess;
use Laminas\Diactoros\ServerRequest;


class LogementController extends Controller
{
    public function home()
    {
        $view = new View('home/home');
        $view->render();
    }

    public function getLogements(): void
    {

        $view_data = [
            'h1' => 'Nos logements',
            $logements = AppRepoManager::getRm()->getLogementsRepository()->getAllLogements(),
            'form_success' => Session::get(Session::FORM_SUCCESS),
            'form_result' => Session::get(Session::FORM_RESULT),
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
