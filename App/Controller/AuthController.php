<?php

namespace App\Controller;

use App\Model\User;
use Core\View\View;
use App\AppRepoManager;
use Core\Form\FormError;
use Core\Form\FormResult;
use Core\Session\Session;
use Core\Controller\Controller;
use Laminas\Diactoros\ServerRequest;

class AuthController extends Controller
{

  //registerForm() et loginForm() : Ces méthodes renvoient les vues correspondant aux formulaires d'inscription et de connexion respectivement. 
  //Elles utilisent la classe View pour charger et rendre les vues avec les données nécessaires (comme les messages d'erreur de formulaire).
    /**
     * Méthode qui renvoie la vue du formulaire d'enregistrement.
     * @return void
     */
    public function registerForm()
    {
        $view = new View('auth/inscription');
        $view_data = [
            'form_result' => Session::get(Session::FORM_RESULT)
        ];
        $view->render($view_data);
    }

    /**
     * Méthode qui renvoie la vue du formulaire de connexion.
     * @return void
     */
    public function loginForm()
    {
        $view = new View('auth/login');
        $view_data = [
            'form_result' => Session::get(Session::FORM_RESULT)
        ];
        $view->render($view_data);
    }

    /**
     * Traite le formulaire d'inscription. Il valide les champs du formulaire (email, mot de passe, confirmation de mot de passe, nom et prénom), vérifie les erreurs potentielles
     * (champs vides, mots de passe non identiques, email invalide, etc.), puis ajoute l'utilisateur en base de données via AppRepoManager.
     * Méthode qui permet de traiter le formulaire d'enregistrement.
     */
    public function register(ServerRequest $request)
    {
        // Réception des données du formulaire
        $data_form = $request->getParsedBody();
        // Initialisation de FormResult pour stocker les messages d'erreurs
        $form_result = new FormResult();
        // Création d'une instance de User
        $user = new User();

        // Validation des champs du formulaire
        if (
            empty($data_form['email']) ||
            empty($data_form['password']) ||
            empty($data_form['password_confirm']) ||
            empty($data_form['lastname']) ||
            empty($data_form['firstname'])
        ) {
            $form_result->addError(new FormError('Veuillez renseigner tous les champs'));
        } elseif ($data_form['password'] !== $data_form['password_confirm']) {
            $form_result->addError(new FormError('Les mots de passe ne sont pas identiques'));
        } elseif (!$this->validEmail($data_form['email'])) {
            $form_result->addError(new FormError('L\'email n\'est pas valide'));
        } elseif (!$this->validPassword($data_form['password'])) {
            $form_result->addError(new FormError('Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre'));
        } elseif ($this->userExist($data_form['email'])) {
            $form_result->addError(new FormError('Cet utilisateur existe déjà'));
        } else {
            // Création des données utilisateur à insérer dans la base de données
            $data_user = [
                'email' => strtolower($this->validInput($data_form['email'])),
                'password' => password_hash($this->validInput($data_form['password']), PASSWORD_BCRYPT),
                'lastname' => $this->validInput($data_form['lastname']),
                'firstname' => $this->validInput($data_form['firstname'])
            ];

            // Ajout de l'utilisateur via le repository
           $user = AppRepoManager::getRm()->getUserRepository()->addUser($data_user);
        }

        // Redirection en cas d'erreurs
        if ($form_result->hasErrors()) {
            Session::set(Session::FORM_RESULT, $form_result);
            self::redirect('/inscription');
        }

        // Réinitialisation du mot de passe et gestion de la session utilisateur
        $user->password = '';
        Session::set(Session::USER, $user);
        Session::remove(Session::FORM_RESULT);
        self::redirect('/');
    }

    /**
     * Méthode qui vérifie que l'email est au bon format.
     * @param string $email
     * @return bool
     */
    public function validEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Méthode qui vérifie que le mot de passe contient 1 majuscule, 1 minuscule, 1 chiffre et au moins 8 caractères.
     * @param string $password
     * @return bool
     */
    public function validPassword(string $password): bool
    {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password);
    }

    /**
     * Méthode qui vérifie si l'utilisateur existe (avec cet email).
     * @param string $email
     * @return bool
     */
    public function userExist(string $email): bool
    {
        $user = AppRepoManager::getRm()->getUserRepository()->findUserByEmail($email);
        return !is_null($user);
    }

    /**
     * Méthode qui sécurise les données.
     * @param string $data
     * @return string
     */
    public function validInput(string $data): string
    {
        $data = trim($data);
        $data = strip_tags($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * Méthode qui vérifie si un utilisateur est en session.
     * @return bool
     */
    public static function isAuth(): bool
    {
        return !is_null(Session::get(Session::USER));
    }

    /**
     * Méthode qui permet de traiter le formulaire de connexion.
     */
    public function login(ServerRequest $request)
    {
        // Réception des données du formulaire
        $data_form = $request->getParsedBody();
        // Initialisation de FormResult pour stocker les messages d'erreurs
        $form_result = new FormResult();
        // Création d'une instance de User
        $user = new User();

        // Validation des champs du formulaire
        if (
            empty($data_form['email']) ||
            empty($data_form['password'])
        ) {
            $form_result->addError(new FormError('Veuillez renseigner tous les champs'));
        } elseif (!$this->validEmail($data_form['email'])) {
            $form_result->addError(new FormError('L\'email n\'est pas valide'));
        } else {
            $email = strtolower($this->validInput($data_form['email']));
            // Vérification de l'existence de l'utilisateur et correspondance du mot de passe
            $user = AppRepoManager::getRm()->getUserRepository()->findUserByEmail($email);
            if (is_null($user) || !password_verify($this->validInput($data_form['password']), $user->password)) {
                $form_result->addError(new FormError('Email et/ou mot de passe incorrect(s)'));
            }
        }

        // Redirection en cas d'erreurs
        if ($form_result->hasErrors()) {
            Session::set(Session::FORM_RESULT, $form_result);
            self::redirect('/connexion');
        }

        // Réinitialisation du mot de passe et gestion de la session utilisateur
        $user->password = '';
        Session::set(Session::USER, $user);
        Session::remove(Session::FORM_RESULT);
        self::redirect('/');
    }

    /**
     * Méthode qui déconnecte un utilisateur.
     * @return void
     */
    public function logout(): void
    {
        // Destruction de la session utilisateur
        Session::remove(Session::USER);
        // Redirection vers la page d'accueil
        self::redirect('/');
    }
}
