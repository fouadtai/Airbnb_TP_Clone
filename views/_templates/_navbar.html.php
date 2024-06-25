<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil - Airbnb</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="style_homepage.css">
  <style>
    /* Styles spécifiques pour la fenêtre modale et le formulaire */
    /* Copiez et collez le CSS de la réponse précédente ici */
  </style>
</head>

<body>
  <!-- Barre de navigation -->
  <nav class="navbar">
    <div class="container">
      <a href="#" class="logo">
        <img src="/public/assets/images/airbnb.svg" alt="Airbnb Logo">
      </a>
      <ul class="nav-links">
        <li><a href="#">Découvrir</a></li>
        <li><a href="#">Devenir hôte</a></li>
        <li><a href="#">Offrir une expérience</a></li>
        <?php if (\App\Controller\AuthController::isAuth()) : ?>
          <form action="/logout" method="get" style="display:inline;">
            <button type="submit">Se déconnecter</button>
          </form>
        <?php else : ?>
          <li><a href="/connexion">Se connecter</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </nav>

  <!-- Section principale -->
  <section class="hero">
    <div class="container">
      <h1>Louez des logements uniques sur Airbnb</h1>
      <p>Découvrez des locations de vacances qui vous donnent accès à une maison complète.</p>
      <a href="/inscription" class="btn-primary" id="openModalBtn">Commencer</a>
    </div>
  </section>





</body>

</html>