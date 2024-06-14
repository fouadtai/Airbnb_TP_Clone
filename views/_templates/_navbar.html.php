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
        <img src="/public/assets/images/airbnb.png" alt="Airbnb Logo">
      </a>
      <ul class="nav-links">
        <li><a href="#">Découvrir</a></li>
        <li><a href="#">Devenir hôte</a></li>
        <li><a href="#">Offrir une expérience</a></li>
        <li><a href="#">Se connecter</a></li>
      </ul>
    </div>
  </nav>

  <!-- Section principale -->
  <section class="hero">
    <div class="container">
      <h1>Louez des logements uniques sur Airbnb</h1>
      <p>Découvrez des locations de vacances qui vous donnent accès à une maison complète.</p>
      <a href="#" class="btn-primary" id="openModalBtn">Commencer</a>
    </div>
  </section>

  <!-- Fenêtre modale -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" id="closeModalBtn">&times;</span>
      <h2>Inscription sur Airbnb</h2>
      <!-- Formulaire d'inscription -->
      <form action="inscription.php" method="POST">
        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Téléphone :</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required><br><br>

        <input type="submit" value="S'inscrire">
      </form>
    </div>
  </div>

  <script>
    // Script JavaScript pour gérer l'ouverture et la fermeture de la modal
    var openModalBtn = document.getElementById("openModalBtn");
    var closeModalBtn = document.getElementById("closeModalBtn");
    var modal = document.getElementById("myModal");

    openModalBtn.addEventListener("click", function() {
      modal.style.display = "block";
    });

    closeModalBtn.addEventListener("click", function() {
      modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    });
  </script>

</body>

</html>