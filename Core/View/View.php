<?php

namespace Core\View;

use App\Controller\AuthController;

class View
{
  //on doit définir le chemin absolu vers le dossier views
  public const PATH_VIEW = PATH_ROOT . 'views' . DS;
  //on crée une seconde constante pour aller dans le dossier _templates
  public const PATH_PARTIALS = self::PATH_VIEW . '_templates' . DS;
  //on déclare un titre par défaut
  public string $title = 'Papa Pizza';

  //on déclare un constructeur
  public function __construct(private string $name, private bool $is_complete = true)
  {
  }

  //méthode pour récupérer le chemin de la vue
  // 'home/home'
  private function getRequirePath(): string
  {
    //on va explode le nom de la vue pour récupérer le dossier et le fichier
    $arr_name = explode('/', $this->name);
    //on récupère le premier élément
    $category = $arr_name[0];
    //on récupère le second élément
    $name = $arr_name[1];
    //si je crée un template on ajoutera un _ devant le nom du fichier
    $name_prefix = $this->is_complete ? '' : '_';
    //reste plus qu'a retourné le chemin complet
    return self::PATH_VIEW . $category . DS . $name_prefix . $name . '.html.php';
  }

  //on crée la méthode de rendu
  public function render(?array $view_data = [])
  {
    //on récupère les données de l'utilisateur
    $auth = AuthController::class;
    //si on a des données on les extrait
    if (!empty($view_data)) {
      extract($view_data);
    }
    //mise en cache du contenu de la vue
    ob_start();
    //on import le template _header.html.php si la vue est complète
    if($this->is_complete){
      require self::PATH_PARTIALS . '_header.html.php';
    }

    //on import la vue
    require_once $this->getRequirePath();

    //on import le template _footer.html.php si la vue est complète
    if($this->is_complete){
      require self::PATH_PARTIALS . '_footer.html.php';
    }

    //on libère le cache
    ob_end_flush();
  }
}
