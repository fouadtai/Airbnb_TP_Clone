<?php

use Core\Session\Session; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rbnb - Logement Détail</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .container-detail {
      background-color: #f8f9fa;
      padding: 20px;
    }

    .card-detail {
      border-radius: 15px;
      overflow: hidden;
    }

    .card-detail img {
      max-width: 100%;
      height: auto;
      border-radius: 15px;
    }

    .infos-equipements {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .card-body {
      flex: 1;
    }

    .equipements {
      flex: 1;
    }

    .equipements img {
      margin-right: 10px;
    }

    .formulaire {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .formulaire h2 {
      margin-bottom: 20px;
    }

    .formulaire .form-group {
      margin-bottom: 15px;
    }

    .btn-reserver {
      background-color: #FF385C;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 25px;
      font-size: 18px;
    }

    .btn-reserver:hover {
      background-color: #e31c3d;
    }

    .total {
      margin-top: 20px;
      text-align: center;
    }

    .total h4 {
      font-weight: bold;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <div class="container-detail">
    <div class="container mt-5 p-0">
      <?php if (!$auth::isAuth()) $auth::redirect('/connexion') ?>

      <div class="card card-detail">
        <div class="d-flex justify-content-center flex-wrap">
          <?php foreach ($logement->media as $index => $media) : ?>
            <a href="/assets/images/<?= $media->image_path ?>" target="_blank">
              <img src="/assets/images/<?= $media->image_path ?>" class="img mb-3" alt="Image du logement">
            </a>
          <?php endforeach; ?>
        </div>

        <div class="infos-equipements p-4">
          <div class="card-body">
            <h1 class="card-title"> <?= $logement->title ?> </h1>
            <p class="card-text"><?= $logement->description ?></p>
            <p class="card-text">Type de logement : <?= $logement->type_logement->label ?></p>
            <p class="card-text price">Prix : <span id="nightPrice" class="price1"><?= $logement->price_per_night ?> </span>€ / nuit </p>
            <p class="card-text">Taille du logement : <?= $logement->Taille ?> m² </p>
            <p class="card-text">Nombre de chambres : <?= $logement->nb_room ?> </p>
            <p class="card-text">Nombre de lits : <?= $logement->nb_bed ?> </p>
            <p class="card-text">Nombre de salles de bains : <?= $logement->nb_bath ?> </p>
            <p class="card-text">Nombre de voyageurs : <?= $logement->nb_traveler ?> </p>
          </div>
          <div class="equipements">
            <p class="fw-bold">Equipements inclus dans ce logement :</p>
            <div class="d-flex flex-wrap">
              <?php foreach ($logement->equipements as $equipement) : ?>
                <div class="d-flex align-items-center m-2">
                  <img style="width: 20px; height: 20px;" src="/assets/icons/icons/<?= $equipement->image_path ?>" alt="">
                  <p class="m-0"><?= $equipement->label ?> </p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <form class="formulaire mt-5" action="/reservation_form" method="post" onsubmit="copierSpanDansHidden()">
      <input type="hidden" name="user_id" value="<?= Session::get(Session::USER)->id ?>">
      <input type="hidden" name="logement_id" value="<?= $logement->id ?>">
      <h2 class="mb-4 text-center">Réservations</h2>
      <div class="d-flex justify-content-between">
        <div class="dates w-100 mr-3">
          <div class="form-group">
            <label for="start_date">Date d'arrivée</label>
            <input id="start_date" type="date" class="form-control" name="date_start" required>
          </div>
          <div class="form-group">
            <label for="end_date">Date de départ</label>
            <input id="end_date" type="date" class="form-control" name="date_end" required>
          </div>
        </div>
        <div class="number w-100 ml-3">
          <div class="form-group">
            <label for="nb_adult">Nombre d'adultes :</label>
            <input type="number" class="form-control" id="nb_adult" name="nb_adult" value="1" required>
          </div>
          <div class="form-group">
            <label for="nb_child">Nombre d'enfants :</label>
            <input type="number" class="form-control" id="nb_child" name="nb_child" value="0" required>
          </div>
        </div>
      </div>
      <div class="total">
        <h4>Prix total du séjour : <span id="total" name="price_total"></span> €</h4>
        <input type="hidden" id="hidden_input" name="price_total" value="<?= $logement->price_per_night ?>">
        <button type="submit" class="btn btn-reserver mt-3">Réserver</button>
      </div>
    </form>
  </div>

  <script>
    function copierSpanDansHidden() {
      const nightPrice = parseFloat(document.getElementById('nightPrice').textContent);
      const startDate = new Date(document.getElementById('start_date').value);
      const endDate = new Date(document.getElementById('end_date').value);
      const days = (endDate - startDate) / (1000 * 60 * 60 * 24);
      const totalPrice = nightPrice * days;

      document.getElementById('total').textContent = totalPrice.toFixed(2);
      document.getElementById('hidden_input').value = totalPrice.toFixed(2);
    }

    document.getElementById('start_date').addEventListener('change', copierSpanDansHidden);
    document.getElementById('end_date').addEventListener('change', copierSpanDansHidden);
  </script>
</body>

</html>