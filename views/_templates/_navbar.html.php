<?php

use App\AppRepoManager;
use App\Model\User;
use Core\Session\Session;

// $user = AppRepoManager::getRm()->getUserRepository()->readById(User::class, Session::get(Session::USER)->id);
?>
<div class="d-flex justify-content-around align-items-center">
  <!-- logo -->
  <div class="nav-logo">
    <a href="/">
      <img class="logo" src="../assets/images/logo_airbnb.svg" alt="logo application Airbnb">
    </a>
  </div>

  <!--  barre de navigation -->
  <div>
    <nav class="navbar">
      <ul class="d-flex justify-content-center">
        <li><a class="fw-bold" href="/">Accueil</a></li>

      </ul>
    </nav>
  </div>
  <!-- menu du profil -->
  <div>
    <nav>
      <ul class="profile-menu">
        <li>
          <!-- si je suis en session j'affiche mon compte -->
          <?php if ($auth::isAuth()) : ?>
            <div class="dropdown custom-link">
              <a class="dropdown-toggle profile-menu fw-bold" href="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Mon compte <i class="bi bi-person custom-svg"> </i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item custom-link">Bonjour : <?= Session::get(Session::USER)->firstname ?></a></li>
                <li><a class="dropdown-item custom-link" href="#">Mon profil</a></li>
                <li><a class="dropdown-item custom-link" href="/mes_reservations/<?= Session::get(Session::USER)->id ?> ">Mes réservations</a></li>

                <li><a class="dropdown-item custom-link" href="/mes_logements/<?= Session::get(Session::USER)->id ?> ">Mes logements en location</a></li>
                <li><a class="dropdown-item custom-link" href="/add_logement">Louer mon bien</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item custom-link" href="/logout">Déconnexion</a></li>
              </ul>
            </div>
          <?php else : ?>
            <a href="/connexion">Se connecter
              <i class="bi bi-person custom-svg"></i>
            </a>
          <?php endif ?>
        </li>
      </ul>

    </nav>
  </div>


</div>
<hr>