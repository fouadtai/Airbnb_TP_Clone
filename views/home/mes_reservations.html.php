<?php if (!$auth::isAuth()) $auth::redirect('/connexion'); ?>

<h3 class="title-reservation">Mes réservations</h3>

<!--$reservations vient du Controller UserController (car c'est lui qui appelle la vue home/mes_reservations) et de la fonction myReservationsByUserId -->

<div class= " table">
<table class="table table-striped">
  <thead>
    <tr>
      <th>Date de début</th>
      <th>Date de fin</th>
      <th>Prix total du séjour</th>
      <th>Nombre d'adultes</th>
      <th>Nombre d'enfants</th>
      <th>DELETE</th>
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
        <td><a href="/delete_reservation/<?= $reservation->id ?>">DELETE </a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>