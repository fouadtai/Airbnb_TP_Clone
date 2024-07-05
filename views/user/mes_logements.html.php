<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes logements disponibles</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .text-center {
      font-family: 'Circular Std', sans-serif;
      font-weight: bold;
      margin: 20px 0;
    }

    .container {
      margin-top: 20px;
    }

    .card {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease-in-out;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    .card-img-top {
      width: 100%;
      height: auto;
      border-bottom: 1px solid #eaeaea;
    }

    .card-body {
      padding: 20px;
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
      padding: 10px 20px;
      border-radius: 25px;
      font-size: 16px;
    }

    .btn-primary:hover {
      background-color: #e31c3d;
    }

    .voir-reservations {
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <h4 class="text-center m-5">Mes logements disponibles à la location</h4>

  <div class="container">
    <div class="row">
      <?php foreach ($meslogements as $logements) : ?>
        <div class="col-md-4 p-3">
          <div class="card mb-4">
            <!-- Itérer sur chaque image associée au logement -->
            <?php if (!empty($logements->media)) : ?>
              <div id="carousel<?= $logements->id ?>" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php foreach ($logements->media as $index => $media) : ?>
                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                      <img src="/assets/images/<?= $media->image_path ?>" class="d-block w-100" alt="<?= $logements->title ?>">
                    </div>
                  <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carousel<?= $logements->id ?>" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel<?= $logements->id ?>" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            <?php endif; ?>

            <div class="card-body">
              <h5 class="card-title"><?= $logements->title ?></h5>
              <p class="card-text"><?= $logements->description ?></p>
              <p class="card-text">Prix de la nuit : <?= $logements->price_per_night ?> €</p>
              <p class="card-text">Nombre de chambres : <?= $logements->nb_room ?></p>
              <p class="card-text">Nombre de lits : <?= $logements->nb_bed ?></p>
              <p class="card-text">Nombre de salles de bain : <?= $logements->nb_bath ?></p>
              <p class="card-text">Nombre de voyageurs maximum : <?= $logements->nb_traveler ?></p>
              <a href="/mes_biens_reserves/<?= $logements->id ?>" class="btn btn-primary voir-reservations">Voir les réservations</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
<?php
// Connexion à la base de données (à adapter selon votre configuration)
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "appli-vierge";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO à exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price_per_night = $_POST['price_per_night'];
    $nb_room = $_POST['nb_room'];
    $nb_bed = $_POST['nb_bed'];
    $nb_bath = $_POST['nb_bath'];
    $nb_traveler = $_POST['nb_traveler'];

    // Préparer la requête SQL
    $sql = "INSERT INTO logements (title, description, price_per_night, nb_room, nb_bed, nb_bath, nb_traveler)
            VALUES (:title, :description, :price_per_night, :nb_room, :nb_bed, :nb_bath, :nb_traveler)";
    $stmt = $conn->prepare($sql);

    // Binder les paramètres
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price_per_night', $price_per_night);
    $stmt->bindParam(':nb_room', $nb_room);
    $stmt->bindParam(':nb_bed', $nb_bed);
    $stmt->bindParam(':nb_bath', $nb_bath);
    $stmt->bindParam(':nb_traveler', $nb_traveler);

    // Exécuter la requête
    $stmt->execute();

    echo "Le logement a été ajouté avec succès.";

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermer la connexion
$conn = null;
?>


</html>