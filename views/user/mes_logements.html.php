<h4 class="text-center m-5">Mes logements disponibles à la location</h4>

<div class="container">
  <div class="row">
    <?php foreach ($meslogements as $logements) : ?>
      
      <div class="col-md-4 p-0 ">
        <div class="card mb-5 d-flex align-items-center">
          <!-- Itérer sur chaque image associée au logement -->
          <?php if (!empty($logements->media)) : ?>
            <?php foreach ($logements->media as $index => $media) : ?>
              <img src="/assets/images/<?= $media->image_path ?>" class="card-img-top logement-image <?= $index > 0 ? 'additional-image d-none' : '' ?>" alt="<?= $logements->title ?>">
            <?php endforeach; ?>
          <?php endif; ?>
 
          <div class="card-body">
            <h5 class="card-title"><?= $logements->title ?></h5>
            <p class="card-text"><?= $logements->description ?></p>
            <p class="card-text">Prix de la nuit : <?= $logements->price_per_night ?> €</p>
            <p class="card-text">Nombre de chambres : <?= $logements->nb_room ?></p>
            <p class="card-text">Nombre de lits : <?= $logements->nb_bed ?></p>
            <p class="card-text">Nombre de salles de bain : <?= $logements->nb_bath ?></p>
            <p class="card-text">Nombre de voyageurs maximum : <?= $logements->nb_traveler ?></p>
            <a href="/mes_biens_reserves/<?= $logements->id ?>" class="btn btn-primary voir-reservations">voir les réservations</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
