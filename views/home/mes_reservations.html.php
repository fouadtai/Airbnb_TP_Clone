<?php if (!$auth::isAuth()) $auth::redirect('/connexion'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Réservations</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .title-reservation {
      font-family: 'Circular Std', sans-serif;
      font-weight: bold;
      margin: 20px 0;
      text-align: center;
    }

    .table-container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table th,
    .table td {
      vertical-align: middle;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 0, 0, 0.05);
    }

    .btn-delete {
      background-color: #FF385C;
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 14px;
    }

    .btn-delete:hover {
      background-color: #e31c3d;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <h3 class="title-reservation">Mes réservations</h3>
    <div class="table-container">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Prix total du séjour</th>
            <th>Nombre d'adultes</th>
            <th>Nombre d'enfants</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($reservations as $reservation) : ?>
            <tr>
              <td><?= $reservation->date_start ?></td>
              <td><?= $reservation->date_end ?></td>
              <td><?= $reservation->price_total ?> €</td>
              <td><?= $reservation->nb_adult ?></td>
              <td><?= $reservation->nb_child ?></td>
              <td>
                <a href="/delete_reservation/<?= $reservation->id ?>" class="btn btn-delete">DELETE</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>