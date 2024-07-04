<?php

use App\AppRepoManager;
use App\Model\User;
use Core\Session\Session;

// $user = AppRepoManager::getRm()->getUserRepository()->readById(User::class, Session::get(Session::USER)->id);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
  .navbar-custom {
    background-color: white;
    border-bottom: 1px solid #e7e7e7;
  }

  .nav-logo img {
    height: 30px;
  }

  .nav-search {
    flex-grow: 1;
    margin-left: 30px;
    margin-right: 30px;
  }

  .nav-search input {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #e7e7e7;
    border-radius: 20px;
  }

  .profile-menu .dropdown-menu {
    right: 0;
    left: auto;
  }

  .custom-link {
    color: #484848;
  }

  .nav-item .nav-link {
    color: #FF385C;
    /* Change the color here */
  }
</style>

<div class="d-flex justify-content-between align-items-center navbar-custom p-2">
  <!-- logo -->
  <div class="nav-logo">
    <a href="/">
      <img class="logo" src="../assets/images/logo_airbnb.svg" alt="logo application Airbnb">
    </a>
  </div>

  <!--  barre de recherche -->
  <div class="nav-search">
    <input type="text" placeholder="Commencez votre recherche">
  </div>

  <!-- menu du profil -->
  <div>
    <nav>
      <ul class="profile-menu d-flex align-items-center">
        <li class="nav-item">
          <a class="nav-link custom-link" href="#">Devenir hôte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-link" href="#">
            <i class="fas fa-globe"></i>
          </a>
        </li>
        <li class="nav-item">
          <?php if ($auth::isAuth()) : ?>
            <div class="dropdown custom-link">
              <a class="dropdown-toggle profile-menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bars"></i> <i class="fas fa-user-circle"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item custom-link" href="#">Mon profil</a>
                <a class="dropdown-item custom-link" href="/mes_reservations/<?= Session::get(Session::USER)->id ?> ">Mes réservations</a>
                <a class="dropdown-item custom-link" href="/mes_logements/<?= Session::get(Session::USER)->id ?> ">Mes logements</a>
                <a class="dropdown-item custom-link" href="/add_logement">Louer mon bien</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item custom-link" href="/logout">Déconnexion</a>
              </div>
            </div>
          <?php else : ?>
            <a href="/connexion" class="custom-link">
              <i class="fas fa-user-circle"></i> Se connecter
            </a>
          <?php endif ?>
        </li>
      </ul>
    </nav>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>