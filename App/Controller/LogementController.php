<?php

namespace App\Controller;

use Core\View\View;
use App\AppRepoManager;
use App\Model\Logement;
use Core\Form\FormError;
use Core\Form\FormResult;
use Core\Session\Session;
use Core\Controller\Controller;
use Laminas\Diactoros\ServerRequest;

class LogementController extends Controller
{
  /**
   * Methode qui renvoie la vue de la page d'accueil.
   */
  public function home()
  {
    // Préparation des données à transmettre à la vue
    $view_data = [
      'title' => 'Accueil',
      'logement_list' => [
        'Margherita',
        'Hawaiana',
        'Napolitana'
      ]
    ];

    // Création de l'objet View pour afficher la vue 'home/logements'
    $view = new View('home/logements');
    $view->render($view_data);
  }


  /**
   * Methode qui renvoie la vue de la liste des logements.
   */
  public function getLogements(): void
  {
    // Récupération des logements depuis le repository via AppRepoManager
    $logements = AppRepoManager::getRm()->getLogementRepository()->getAllLogements();

    // Préparation des données à transmettre à la vue
    $view_data = [
      'h1' => 'Tous les logements',
      'logements' => $logements
    ];

    // Création de l'objet View pour afficher la vue 'home/index'
    $view = new View('home/index');
    $view->render($view_data);
  }


  /**
   * Methode qui renvoie la vue du détail d'un logement par son ID.
   * @param int $id L'ID du logement à afficher
   */
  public function getLogementById(int $id): void
  {
    // Récupération du logement par son ID depuis le repository via AppRepoManager
    $logement = AppRepoManager::getRm()->getLogementRepository()->getLogementById($id);
    //var_dump($logement);die;

    // Préparation des données à transmettre à la vue
    $view_data = [
      'logement' => $logement,
      'form_result' => Session::get(Session::FORM_RESULT),
      'form_success' => Session::get(Session::FORM_SUCCESS),
    ];

    // Création de l'objet View pour afficher la vue 'home/logement_detail'
    $view = new View('home/logement_detail');
    $view->render($view_data);
  }


  /**
   * Methode qui renvoie la vue du formulaire d'ajout d'un logement.
   */
  public function addLogement()
  {
    // Préparation des données à transmettre à la vue
    $view_data = [
      'form_result' => Session::get(Session::FORM_RESULT),
      'form_success' => Session::get(Session::FORM_SUCCESS),
    ];
    
    // Création de l'objet View pour afficher la vue 'home/add_logement'
    $view = new View('home/add_logement');
    $view->render($view_data);
  }

  
  /**
   * Methode qui traite le formulaire d'ajout d'un logement.
   * @param ServerRequest $request La requête contenant les données du formulaire
   */
  public function addLogementForm(ServerRequest $request)
  {
    // Réception des données du formulaire
    $data_form = $request->getParsedBody();
 
    // Instanciation de FormResult pour stocker les messages d'erreurs
    $form_result = new FormResult();
    
    // Validation des données et traitement
    $title = $data_form['title'];
    $country = $data_form['country'];
    $city = $data_form['city'];
    $zip_code = $data_form['zip_code'];
    $size = $data_form['size'];
    $description = $data_form['description'];
    $nb_room = $data_form['nb_room'];
    $nb_bed = $data_form['nb_bed'];
    $nb_bath = $data_form['nb_bath'];
    $nb_traveler = $data_form['nb_traveler'];
    $price = $data_form['price_per_night'];

    // Vérification de la saisie
    if (
      empty($title) ||
      empty($country) ||
      empty($city) ||
      empty($zip_code) ||
      empty($size) ||
      empty($description) ||
      empty($nb_room) ||
      empty($nb_bed) ||
      empty($nb_bath) ||
      empty($nb_traveler) ||
      empty($price)
    ) {
      $form_result->addError(new FormError('Veuillez renseigner tous les champs'));
    }
    // ?????????????
    // S'il y a des erreurs, redirection vers le formulaire avec les erreurs
    if ($form_result->hasErrors()) {
      Session::set(Session::FORM_RESULT, $form_result);
      self::redirect('/add-logement');
    }

    
    // Exemple de redirection après succès
    Session::set(Session::FORM_SUCCESS, 'Logement ajouté avec succès');
    self::redirect('/add-logement');
  }
    // ????????????


    public function myReservationsByHostId( $id)
    {
      $view_data = [
        'reservations' => AppRepoManager::getRm()->getReservationRepository()->getReservationsByLogementId($id),
        'medias' => AppRepoManager::getRm()->getMediaRepository()->getMediaById($id),
  
      ];
      //var_dump($view_data);die;
      $view = new View('user/mes_biens_reserves');
      $view->render($view_data);
    }
}
