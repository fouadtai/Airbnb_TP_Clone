<div class="container">
  <div class="accueil">
    <p>
    <h1 class="titre-principal">
      Bienvenue sur le site de <strong>Airbnb</strong>
    </h1>
    </p>
    <p class="sous-titre">

      Location de vacances, Cabanes, <br>Maisons de campagnes et bien d'autres

  </div>

  <h3 class="available text-start mb-5">Tous les logements disponibles :</h3>
  <div class="row justify-content-center">
    <?php foreach ($logements as $logement) : ?>
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4 d-flex justify-content-center">
        <div class="card h-100 d-flex align-items-center">
          <a href="/logement_detail/<?= $logement->id ?>">
            <?php foreach ($logement->media as $medias) : ?>
              <img src="/assets/images/<?= $medias ?>" class="card-img-top" alt="">
            <?php endforeach; ?>
          </a>
          <div class="card-body align-items-center">
            <div>
            <h5 class="card-title"> <?= $logement->title ?> </h5>
            <p class="card-text"> <?= $logement->price_per_night ?> € / nuit</p>
          </div>
            <a href="/logement_detail/<?= $logement->id ?>" class="btn ">Voir les détails</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>