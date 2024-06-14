<?php

namespace App\Controller;

use App\AppRepoManager;
use App\Model\User;
use Core\View\View;
use Core\Form\FormResult;
use Core\Session\Session;
use Core\Controller\Controller;
use Core\Form\FormError;
use Laminas\Diactoros\ServerRequest;

class AuthController extends Controller
{
    /**
     * méthode qui renvoie la vue du formulaire de connexion
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
     * méthode qui renvoie la vue du formulaire d'enregistrement
     * @return void
     */
    public function registerForm()
    {
        $view = new View('auth/register');
        $view_data = [
            'form_result' => Session::get(Session::FORM_RESULT)
        ];

        $view->render($view_data);
    }

    /**
     * méthode qui permet de traiter le formulaire d'enregistrement
     */
    public function register(ServerRequest $request)
    {
        //on receptionne les données du formulaire
        $data_form = $request->getParsedBody();
        //on instancie formResult pour stocker les messages d'erreurs
        $form_result = new FormResult();
        //on doit crée une instance de User
        $user = new User();

        //on s'occupe de toute les vérifications
        if (
            empty($data_form['email']) ||
            empty($data_form['password']) ||
            empty($data_form['password_confirm']) ||
            empty($data_form['lastname']) ||
            empty($data_form['firstname']) ||
            empty($data_form['phone'])
        ) {
            $form_result->addError(new FormError('Veuillez remplir tous les champs'));
        } elseif ($data_form['password'] !== $data_form['password_confirm']) {
            $form_result->addError(new FormError('Les mots de passe ne correspondent pas'));
        } elseif (!$this->validEmail($data_form['email'])) {
            $form_result->addError(new FormError('L\'email n\'est pas valide'));
        } elseif (!$this->validPassword($data_form['password'])) {
            $form_result->addError(new FormError('Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre'));
        } elseif ($this->userExist($data_form['email'])) {
            $form_result->addError(new FormError('Cet utilisateur existe déjà'));
        } else {
            $data_user = [
                'email' => strtolower($this->validInput($data_form['email'])),
                'password' => password_hash($this->validInput($data_form['password']), PASSWORD_BCRYPT),
                'lastname' => $this->validInput($data_form['lastname']),
                'firstname' => $this->validInput($data_form['firstname']),
                'phone' => $this->validInput($data_form['phone'])
            ];

            AppRepoManager::getRm()->getUserRepository()->addUser($data_user);
        }

        if ($form_result->hasErrors()) {
            Session::set(Session::FORM_RESULT, $form_result);
            self::redirect('/inscription');
        }
        $user->password = '';
        Session::set(Session::USER, $user);
        Session::remove(Session::FORM_RESULT);
        self::redirect('/');
    }

    /**
     * méthode qui permet de traiter le formulaire de connexion
     */
    public function login(ServerRequest $request)
    {
        //on receptionne les données du formulaire
        $data_form = $request->getParsedBody();
        //on instancie formResult pour stocker les messages d'erreurs
        $form_result = new FormResult();
        //on doit crée une instance de User
        $user = new User();

        //on s'occupe de toute les vérifications
        if (empty($data_form['email']) || empty($data_form['password'])) {
            $form_result->addError(new FormError('Veuillez remplir tous les champs'));
        } elseif (!$this->validEmail($data_form['email'])) {
            $form_result->addError(new FormError('L\'email n\'est pas valide'));
        } else {
            $email = strtolower($this->validInput($data_form['email']));
            //on vérifie qu'on a bien un utilisateur avec cet email
            $user = AppRepoManager::getRm()->getUserRepository()->findUserByEmail($email);
            if (is_null($user) || !password_verify($this->validInput($data_form['password']), $user->password)) {
                $form_result->addError(new FormError('Email ou mot de passe incorrect'));
            }
        }
        if ($form_result->hasErrors()) {
            Session::set(Session::FORM_RESULT, $form_result);
            self::redirect('/connexion');
        }
        $user->password = '';
        Session::set(Session::USER, $user);
        Session::remove(Session::FORM_RESULT);
        self::redirect('/');
    }

    /**
     * méthode qui vérifie que l'email est du bon format
     * @param string $email
     * @return bool
     */
    public function validEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * méthode qui vérifie que le mot de passe contient 1 majuscule, 1 minuscule, 1 chiffre et au moins 8 caractères
     * @param string $password
     * @return bool
     */
    public function validPassword(string $password): bool
    {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password);
    }

    /**
     * méthode qui vérifie si l'utilisateur existe
     * @param string $email
     * @return bool
     */
    public function userExist(string $email): bool
    {
        $user = AppRepoManager::getRm()->getUserRepository()->findUserByEmail($email);
        return !is_null($user);
    }

    /**
     * méthode qui sécurise les données
     * @param string $data
     * @return string
     */
    public function validInput(string $data): string
    {
        $data = trim($data);
        $data = strip_tags($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * méthode qui vérifie si un utilisateur est en session
     * @return bool
     */
    public static function isAuth(): bool
    {
        return !is_null(Session::get(Session::USER));
    }

    /**
     * méthode qui déconnecte un utilisateur
     * @return void
     */
    public function logout(): void
    {
        //on va détruire la session
        Session::remove(Session::USER);
        //on redirige sur la page d'accueil
        self::redirect('/');
    }
}
