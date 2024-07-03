<?php

namespace App;

use MiladRahimi\PhpRouter\Router;
use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\UserController;
use App\Controller\LogementController;
use Core\Database\DatabaseConfigInterface;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use MiladRahimi\PhpRouter\Exceptions\InvalidCallableException;

class App implements DatabaseConfigInterface
{
  // Ceci est une propriété qui va contenir l'unique instance de cette classe.
  private static ?self $instance = null;

  // Cette méthode est appelée pour obtenir l'unique instance de cette classe.
  // Elle vérifie d'abord si l'instance n'existe pas déjà, sinon elle en crée une nouvelle.
  public static function getApp(): self
  {
    if (is_null(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  // On crée une propriété privée pour stocker le routeur.
  private Router $router;

  // Méthode qui renvoie le routeur.
  public function getRouter()
  {
    return $this->router;
  }

  // Constructeur de la classe. Il est appelé automatiquement quand on crée une instance de la classe.
  private function __construct()
  {
    // On crée une instance de Router.
    $this->router = Router::create();
  }

  // On a 3 méthodes à définir :
  // 1. méthode start pour activer le router.
  public function start(): void
  {
    // On ouvre l'accès aux sessions.
    session_start();
    // On enregistre les routes.
    $this->registerRoutes();
    // On démarre le routeur.
    $this->startRouter();
  }

  // 2. méthode qui enregistre les routes.
  private function registerRoutes(): void
  {
    // ON ENREGISTRE LES ROUTES ICI
    // INFO: si on veut renvoyer une vue à l'utilisateur => route en "get"
    // INFO: si on veut traiter des données d'un formulaire => route en "post"
    $this->router->get('/', [HomeController::class, 'home']);

    // PARTIE AUTHENTIFICATION
    $this->router->get('/inscription', [AuthController::class, 'registerForm']);
    $this->router->get('/connexion', [AuthController::class, 'loginForm']);
    $this->router->post('/register', [AuthController::class, 'register']);
    $this->router->post('/login', [AuthController::class, 'login']);
    $this->router->get('/logout', [AuthController::class, 'logout']);

    // PARTIE UTILISATEUR
    // Route qui permet à l'utilisateur de faire une réservation via le formulaire.
    $this->router->post('/reservation_form', [UserController::class, 'addReservationForm']);
    // Route qui redirige vers la page où l'utilisateur peut voir ses réservations.
    $this->router->get('/mes_reservations/{id}', [UserController::class, 'myReservationsByUserId']);
    // Route qui permet à l'utilisateur de mettre son logement en location via le formulaire.
    $this->router->post('/mes_logements/{id}', [UserController::class, 'addLogementForm']);
    // Route qui redirige vers la page où l'utilisateur peut voir ses logements qu'il a mis en location.
    $this->router->get('/mes_logements/{id}', [UserController::class, 'myLogementsByUserId']);
    // Route qui permet à l'utilisateur de supprimer une réservation.
    $this->router->get('/delete_reservation/{id}', [UserController::class, 'deleteReservation']);
    

    // PARTIE LOGEMENTS
    $this->router->get('/', [LogementController::class, 'getLogements']);
    $this->router->get('/logement_detail/{id}', [LogementController::class, 'getLogementById']);
    $this->router->get('/add_logement', [LogementController::class, 'addLogement']);
    $this->router->post('/add_logement_form', [UserController::class, 'addLogementForm']);

    // Route qui permet à l'hôte de voir ses biens réservés
    $this->router->get('/mes_biens_reserves/{id}', [LogementController::class, 'myReservationsByHostId']);
  }

  // 3. méthode qui démarre le router.
  private function startRouter(): void
  {
    try {
      // On démarre le routeur.
      $this->router->dispatch();
    } catch (RouteNotFoundException $e) {
      // Si une route n'est pas trouvée, on affiche l'erreur.
      echo $e;
    } catch (InvalidCallableException $e) {
      // Si une route a un problème, on affiche l'erreur.
      echo $e;
    }
  }

  // Les méthodes suivantes permettent d'obtenir les informations de configuration de la base de données.
  public function getHost(): string
  {
    return DB_HOST;
  }

  public function getName(): string
  {
    return DB_NAME;
  }

  public function getUser(): string
  {
    return DB_USER;
  }

  public function getPass(): string
  {
    return DB_PASS;
  }
}
