<?php

namespace App\Controller;

use Core\View\View;
use App\AppRepoManager;
use Core\Form\FormError;
use Core\Form\FormResult;
use Core\Session\Session;
use Core\Form\FormSuccess;
use Core\Controller\Controller;
use Laminas\Diactoros\ServerRequest;

class UserController extends Controller
{


    /**
     * methode qui récupère les données du formulaire et les envoie dans la BDD
     * @param ServerRequest $request
     */
    public function addReservationForm(ServerRequest $request)
    {
        //Elle récupère les données du formulaire à l'aide de $request->getParsedBody().
        //Les données sont validées et préparées pour être insérées dans la base de données.
        //Après l'insertion de la réservation, l'utilisateur est redirigé vers sa liste de
        // réservations avec self::redirect('/mes_reservations/' . $user).
        $data_form = $request->getParsedBody();
        //var_dump($data_form);die;
        $form_result = new FormResult;

        // on récup les données du formulaire, on stocke les inputs dans $price, $start...
        $price = $data_form['price_total'] ?? 0;
        $start = $data_form['date_start'];
        $end = $data_form['date_end'];
        $user = $data_form['user_id'];
        $adult = $data_form['nb_adult'];
        $child = $data_form['nb_child'];
        $logement_id = $data_form['logement_id'];


        if (empty($price) || empty($start) || empty($end) || empty($user) || empty($adult) || empty($child) || empty($logement_id)) {
            $form_result->addError(new FormError('Veuillez remplir tous les champs'));
        }
        // on recrée un tableau, nom_colonne_table => nom_donnée_stockée_dans_tableau_audessus
        $reservation_data = [
            'price_total' => $price,
            'date_start' => $start,
            'date_end' => $end,
            'user_id' => $user,
            'nb_adult' => $adult,
            'nb_child' => $child,
            'logement_id' => $logement_id
        ];

        // données stockées dans un tableau, prêtes à être insérées var_dump($reservation_data);
        // données du formulaire var_dump($data_form); die;

        $reservation_data = AppRepoManager::getRm()->getReservationRepository()->insertReservation($reservation_data);
       
        self::redirect('/mes_reservations/' . $user);
    }


    /**
     * Cette méthode récupère les réservations d'un utilisateur spécifique et les transmet à la vue home/mes_reservations. Voici ce qu'elle fait :
     *Elle utilise AppRepoManager pour accéder au repository des réservations et récupérer les réservations par l'ID de l'utilisateur à partir de la session.
     *Les données sont passées à la vue à travers $view_data.
     */
    public function myReservationsByUserId()
    {
        //le controleur doit récupérer le tableau de réservations via le repository, pour le donner à la vue
        $view_data = [
            //la clé "reservations" je mets le nom que je veux mais on le retrouvera dans la vue !!!
            'reservations' =>  AppRepoManager::getRm()->getReservationRepository()->ReservationsByUserId(Session::get(Session::USER)->id),
            
        ];
      
        $view = new View('home/mes_reservations');

        $view->render($view_data);
    }



    //Cette méthode est destinée à traiter les données soumises via le formulaire d'ajout de logement.
    //Elle récupère les données du formulaire à l'aide de $request->getParsedBody().
    //Un objet FormResult est instancié pour stocker les erreurs éventuelles lors de la validation des données.
    //Les données du formulaire sont ensuite validées et vérifiées :
    //Les champs obligatoires sont vérifiés (empty()).
    //Si des erreurs sont détectées, elles sont ajoutées à l'objet FormResult, puis l'utilisateur est redirigé vers le formulaire d'ajout avec les erreurs affichées.
    //Si la validation réussit (aucune erreur détectée), il reste à implémenter la logique pour ajouter le logement dans la base de données. Actuellement, une redirection avec un message de succès est simulée après la soumission réussie du formulaire.

    /**
     * La méthode addLogementForm gère l'ajout d'un logement avec toutes les vérifications nécessaires, y compris le téléchargement d'une image associée au logement.
     *  Voici les points importants :
     *Elle récupère les données du formulaire avec $request->getParsedBody() et l'image avec $_FILES.
     *Les données du formulaire sont validées et préparées pour l'insertion.
     *L'image est téléchargée dans le répertoire public/assets/images/ avec un nom de fichier unique généré par uniqid().
     *Les données sont insérées dans la base de données via les repositories appropriés (LogementRepository, AdresseRepository, MediaRepository).
     *En cas d'erreur lors de l'insertion, des messages d'erreur sont ajoutés à FormResult.
     *Après l'ajout réussi du logement, l'utilisateur est redirigé vers sa liste de logements avec self::redirect('mes_logements/' . $user_id).
     * addLogementForm = methode qui permet d'ajouter un logement via les données du formulaire et les envoie dans la BDD
     * @param ServerRequest $request
     * @return void
     */
    public function addLogementForm(ServerRequest $request): void
    {
        $data_form = $request->getParsedBody(); //récupère les données du formulaire
        $form_result = new FormResult;
        $file_data = $_FILES['photos']; // ['photos'] = input du formulaire


        // on récup les données du formulaire, on stocke les inputs dans $adress $zipCode...
        $adress = $data_form['adress'] ?? '';
        $zipCode = $data_form['zip_code'] ?? '';
        $city = $data_form['city'] ?? '';
        $country = $data_form['country'] ?? '';
        $phone = $data_form['phone'] ?? '';
        $title = $data_form['title'] ?? '';
        $description = $data_form['description'] ?? '';
        $price = $data_form['price_per_night'] ?? 0;
        $nb_room = $data_form['nb_room'] ?? 0;
        $nb_bed = $data_form['nb_bed'] ?? 0;
        $nb_bath = $data_form['nb_bath'] ?? 0;
        $nb_traveler = $data_form['nb_traveler'] ?? 0;
        $type = $data_form['type_logement_id'] ?? 0;
        $user_id = $data_form['user_id'] ?? 0;
        $size = $data_form['size'] ?? 0;
        $equipements = $data_form['equipements']; //récupère tous les équipements envoyés par le formulaire
        //variables pour gérer la photo
        $image_name = $file_data['name'] ?? ''; // d'ou sort ce ['name'] ??????? c'est pas l'input du formulaire . c'est le nom du fichier ?????
        $tmp_path = $file_data['tmp_name'] ?? '';
        //la ou je veux envoyer la photo
        $public_path = 'public/assets/images/';

        // validation du format de l'image
        if (!in_array($file_data['type'] ?? '', ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])) {
            $form_result->addError(new FormError('Le format de l\'image n\'est pas valide'));
        } elseif (
            empty($user_id) ||
            empty($size) ||
            empty($country) ||
            empty($city) ||
            empty($adress) ||
            empty($zipCode) ||
            empty($phone) ||
            empty($description) ||
            empty($nb_room) ||
            empty($nb_bed) ||
            empty($nb_bath) ||
            empty($nb_traveler) ||
            empty($price) ||
            empty($title) ||
            empty($equipements)
        ) {

            $form_result->addError(new FormError('Veuillez remplir tous les champs'));
        } else {
            // redéfinition d'un nom unique pour l'image
            $filename = uniqid() . '_' . $image_name;
            $slug = explode('.', strtolower(str_replace(' ', '-', $filename)))[0];
            $imgPathPublic = PATH_ROOT . $public_path . $filename;
            // déplacement du fichier temporaire vers son dossier de destination
            if (move_uploaded_file($tmp_path, $imgPathPublic)) { //$tmp_path = source et $imgPathPublic = destination
                // appel du repository pour insérer dans la BDD
                // on recrée un tableau, 'nom_colonne_denotreTable_dans_BDD(clés)' => $nom_donné_dans_tableau_au_dessus (valeurs)
                // données envoyées dans la table Adresse de la BDD
                $adress_data = [
                    'adress' => $adress,
                    'zip_code' => $zipCode,
                    'city' => $city,
                    'country' => $country,
                    'phone' => $phone
                ];
                //on stocke l'id de la ligne de l'adresse qu'on vient d'insérer
                $adress_id = AppRepoManager::getRm()->getAdressRepository()->insertAdress($adress_data); // recupère le last ID qui a été crée
                if (!$adress_id) {
                    $form_result->addError(new FormError('Une erreur est survenue lors de l\'insertion de l\'adresse'));
                } else {
                    // données envoyées dans la table Logement de la BDD
                    //il faut que les clés (à gauche) correspondent exactement aux noms de la bdd, sinon elles ne sont pas prises en compte
                    $logement_data = [
                        'title' => $title,
                        'description' => $description,
                        'price_per_night' => $price,
                        'nb_room' => $nb_room,
                        'nb_bed' => $nb_bed,
                        'nb_bath' => $nb_bath,
                        'nb_traveler' => $nb_traveler,
                        'is_active' => 1,
                        'type_logement_id' => $type,
                        'user_id' => $user_id,
                        'adress_id' => intval($adress_id),
                        'Taille' => $size,
                    ];

                    $logement_id = AppRepoManager::getRm()->getLogementRepository()->insertLogement($logement_data);
                    if (!$logement_id) {
                        $form_result->addError(new FormError('Une erreur est survenue lors de l\'insertion du logement'));
                    } else {
                        //on re découpe le tableau des equipements envoyés par le formulaire en plusieurs lignes
                        foreach ($equipements as $equipement) {

                            $equipement_data = [
                                'logement_id' => $logement_id,
                                'equipement_id' => $equipement
                            ];

                            $equipement = AppRepoManager::getRm()->getLogementEquipementRepository()->addEquipementByLogementEquipement($equipement_data);

                            if (!$equipement) {
                                $form_result->addError(new FormError('Une erreur est survenue lors de l\'insertion des equipements'));
                            }
                        }
                        $media = [
                            //les clés doivent correspondre aux noms de colonnes de la BDD
                            'image_path' => $filename,
                            'logement_id' => $logement_id
                        ];
                        $responseMedia = AppRepoManager::getRm()->getMediaRepository()->insertMedia($media);
                        if (!$responseMedia) {
                            $form_result->addError(new FormError('Une erreur est survenue lors de l\'insertion des images'));
                        } else {
                            $form_result->addSuccess(new FormSuccess('Le logement a bien été inséré'));
                        }
                    }
                }
            } else {
                $form_result->addError(new FormError('Une erreur est survenue lors du transfert de l\'image'));
            }


            //on finit toujours les formulaires avec ce genre de check de messages (quand il y a ServerRequest en paramètre de la fonction)
            //si on a des erreurs on les met en session pour les interpreter
            if ($form_result->hasErrors()) {
                Session::set(Session::FORM_RESULT, $form_result);
                //on redirige sur la page du formulaire
                self::redirect('/add_logement');
            }

            //si on a des success on les met en session pour les interpreter
            if ($form_result->hasSuccess()) {
                Session::remove(Session::FORM_RESULT);
                Session::set(Session::FORM_SUCCESS, $form_result);
                //on redirige sur la page mes logements
                self::redirect('mes_logements/' . $user_id);
            }
        }
    }


    /**
     * Cette méthode récupère les logements d'un utilisateur spécifique et les transmet à la vue user/mes_logements. Voici ce qu'elle fait :
     * Elle utilise AppRepoManager pour accéder au repository des logements et récupérer les logements par l'ID de l'utilisateur à partir de la session.
     * Les données sont passées à la vue à travers $view_data.
     */
    public function myLogementsByUserId()
    {
        //le controleur doit récupérer le tableau de logements via le repository, pour le donner à la vue

        $view_data = [
            //la clé "meslogements" je mets le nom que je veux mais on la retrouvera dans la vue avec le meme nom !!!
            'meslogements' =>  AppRepoManager::getRm()->getLogementRepository()->LogementsByUserId(Session::get(Session::USER)->id),
        ];
        $view = new View('user/mes_logements');

        $view->render($view_data);
    }

    public function deleteReservation(int $id): void    //$id je mets le nom que je veux mais il faudra le même nom dans App pour la route !
    {
        $form_result = new FormResult();

        $deleteReservation = AppRepoManager::getRm()->getReservationRepository()->deleteReservation($id);

        if (!$deleteReservation) {
            $form_result->addError(new FormError('Une erreur est survenue lors de la suppression de la pizza'));
        } else {
            $form_result->addSuccess(new FormSuccess('Pizza désactivée avec succès'));
        }

        // gestion des erreurs
        if ($form_result->hasErrors()) {
            // enregistrement des erreurs en session
            Session::set(Session::FORM_RESULT, $form_result);
            self::redirect('/mes_reservations/' . Session::get(Session::USER)->id);
        }

        // si tout est OK, redirection vers la liste des pizzas
        // suppression de la session form_result
        if ($form_result->hasSuccess()) {
            Session::set(Session::FORM_SUCCESS, $form_result);
            Session::remove(Session::FORM_RESULT);
            self::redirect('/mes_reservations/' . Session::get(Session::USER)->id);
        }
    }
}
