<div class="container my-5">
  <h3 class="text-center mb-5">Réservations de mes logements</h3>
  <div class="d-flex flex-column align-items-center">
    <?php if (empty($reservations)) : ?>
      <div class="alert alert-info" role="alert">
        Vous n'avez aucune réservation pour ce logement
      </div>
    <?php else : ?>
      <div class="d-flex flex-column align-items-center">
        <img src="/assets/images/<?= $medias[0]->image_path ?>" alt="Image du logement" class="img-fluid rounded mb-4" style="width: 100%; max-width: 600px;">
        <div class="d-flex flex-wrap justify-content-center gap-4">
          <?php foreach ($reservations as $reservation) : ?>
            <div class="card border-0 shadow-sm mb-4" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Logement réservé</h5>
                <p class="card-text">Du : <?= $reservation->date_start ?></p>
                <p class="card-text">Au : <?= $reservation->date_end ?></p>
                <p class="card-text">Nombre d'adultes : <?= $reservation->nb_adult ?></p>
                <p class="card-text">Nombre d'enfants : <?= $reservation->nb_child ?></p>
                <p class="card-text font-weight-bold">Prix total du séjour : <?= $reservation->price_total ?> €</p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<style>
  .container {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  h3 {
    font-family: 'Circular Std', sans-serif;
    font-weight: bold;
    color: #FF385C;
  }

  .alert {
    font-family: 'Circular Std', sans-serif;
    font-weight: bold;
    color: #484848;
  }

  .card {
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.2s ease-in-out;
  }

  .card:hover {
    transform: translateY(-10px);
  }

  .card-body {
    padding: 20px;
  }

  .card-title {
    font-family: 'Circular Std', sans-serif;
    font-weight: bold;
    color: #FF385C;
  }

  .card-text {
    font-family: 'Circular Std', sans-serif;
    color: #717171;
  }

  .img-fluid {
    border-radius: 20px;
    max-height: 400px;
    object-fit: cover;
  }
</style>