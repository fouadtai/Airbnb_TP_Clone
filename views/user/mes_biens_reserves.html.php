<div class="d-flex  flex-column align-items-center m-5">
  <h3 class="mb-5">Réservations de mes logements</h3>
  <div class="d-flex gap-5">

    <?php if (empty($reservations)) : ?>
      <div class="alert alert-info" role="alert">
        Vous n'avez aucune reservation pour ce logement
      </div>
    <?php else : ?>
        <img style="width: 100%; height: 100%; border-radius: 20px" src="/assets/images/<?= $medias[0]->image_path ?>" alt="">
      <div class="d-flex flex-wrap" >
        <?php foreach ($reservations as $reservation) : ?>
        <div class="detail-reservation d-flex flex-column" style="width: 18rem">
          <div class="img-reservation">
            
          </div>
          <div class=card-infos>
            <div class="card-reservation">
              <p class="">Logement réservé </p>
              <p class="card-text">Du : <?= $reservation->date_start ?> </p>
              <p class="card-text">Au : <?= $reservation->date_end ?></p>
              <p class="card-text">Nombre d'adultes : <?= $reservation->nb_adult ?></p>
              <p class="card-text">Nombre d'enfants : <?= $reservation->nb_child ?></p>
              <p class="card-text">Prix total du séjour : <?= $reservation->price_total ?> €</p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
      
    <?php endif ?>
  </div>
</div>