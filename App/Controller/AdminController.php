<?php

namespace App\Controllers;

use Core\View\View;
use Core\Session\Session;
use Core\Controller\Controller;
use App\Controller\AuthController;
// Assurez-vous que cette dépendance est correctement chargée

class AdminController extends Controller
{

    /**
     * Vérifie si l'utilisateur est connecté et est un admin
     * @return void
     */
    private function checkAdminAuthentication(): void
    {
        // Debugging output
        var_dump(AuthController::isAuth(), AuthController::isAdmin());

        // Vérifier l'authentification et les privilèges administratifs
        if (!AuthController::isAuth() || !AuthController::isAdmin()) {
            $this->redirect('/');
        }
    }

    /**
     * Page d'accueil de l'admin
     * @return void
     */
    public function home(): void
    {
        // Vérifier l'authentification admin avant de rendre la vue
        $this->checkAdminAuthentication();

        // Récupérer les données de session
        $view_data = [
            'form_result' => Session::get(Session::FORM_RESULT),
            'form_success' => Session::get(Session::FORM_SUCCESS)
        ];

        // Rendre la vue
        $view = new View('admin/home');
        $view->render($view_data);
    }

    /**
     * Formater une chaîne de caractères
     * @param string $string
     * @return string
     */
    public static function formaterChaine(string $string): string
    {
        // Enlever les accents
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);

        // Remplacer les espaces par des tirets
        $string = preg_replace('/\s+/', '-', $string);

        return $string;
    }
}
