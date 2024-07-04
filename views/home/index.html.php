<div class="container mt-5">
  <div class="accueil text-center my-5">
    <h1 class="titre-principal display-4 animate__animated animate__fadeIn" style="color: #FF385C;">
      Bienvenue sur <strong>Rbnb</strong>
    </h1>
    <p class="sous-titre lead animate__animated animate__fadeIn animate__delay-1s" style="color: #717171;">
      Découvrez des logements uniques et des endroits magnifiques. <br> Réservez dès maintenant pour une expérience inoubliable.
    </p>
  </div>

  <h3 class="available text-start mb-5 animate__animated animate__fadeIn animate__delay-2s">Nos logements disponibles :</h3>
  <div class="row">
    <?php foreach ($logements as $logement) : ?>
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card h-100 border-0 shadow-sm animate__animated animate__zoomIn">
          <a href="/logement_detail/<?= $logement->id ?>" class="text-decoration-none">
            <?php if (!empty($logement->media)) : ?>
              <img src="/assets/images/<?= $logement->media[0] ?>" class="card-img-top img-fluid rounded" alt="Image of <?= $logement->title ?>">
            <?php endif; ?>
          </a>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $logement->title ?></h5>
            <p class="card-text text-muted"><?= $logement->price_per_night ?> € / nuit</p>
            <a href="/logement_detail/<?= $logement->id ?>" class="btn btn-primary mt-auto animate__animated animate__pulse animate__infinite">Voir les détails</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<style>
  .accueil {
    color: black;
    padding: 50px;
    margin-bottom: 30px;
  }

  .titre-principal {
    font-family: 'Circular Std', sans-serif;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .sous-titre {
    font-family: 'Circular Std', sans-serif;
    color: #717171;
    line-height: 1.5;
  }

  .available {
    font-family: 'Circular Std', sans-serif;
    font-weight: bold;
  }

  .card {
    transition: transform 0.2s ease-in-out;
    border-radius: 15px;
  }

  .card:hover {
    transform: translateY(-10px);
  }

  .card-title {
    font-family: 'Circular Std', sans-serif;
    font-weight: bold;
  }

  .card-text {
    font-family: 'Circular Std', sans-serif;
    color: #717171;
  }

  .btn-primary {
    background-color: #FF385C;
    border: none;
    color: white;
    font-family: 'Circular Std', sans-serif;
    font-weight: bold;
  }

  .btn-primary:hover {
    background-color: #e31c3d;
  }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />