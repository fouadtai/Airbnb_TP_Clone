<?php if($auth::isAuth()) $auth::redirect('/') ?>

<main class="container-form">

  <h1>Je crée mon compte</h1>

<!-- affichage des erreurs s'il y en a -->
<?php if($form_result && $form_result->hasErrors()): ?>
    <div class="alert alert-danger" role="alert">
      <?= $form_result->getErrors()[0]->getMessage() ?>
    </div>
  <?php endif ?>

  <form class="auth-form" action="/register" method="POST">
    <div class="box-auth-input">
      <label class="detail-description">Adresse Email</label>
      <input type="email" class="form-control" name="email">
    </div>

    <div class="box-auth-input">
      <label class="detail-description">Mot de passe</label>
      <input type="password" class="form-control" name="password">
    </div>

    <div class="box-auth-input">
      <label class="detail-description">Confirmer mot de passe</label>
      <input type="password" class="form-control" name="password_confirm">
    </div>

    <div class="box-auth-input">
      <label class="detail-description">Votre nom</label>
      <input type="text" class="form-control" name="lastname">
    </div>

    <div class="box-auth-input">
      <label class="detail-description">Votre prénom</label>
      <input type="text" class="form-control" name="firstname">
    </div>

    <div class="box-auth-input">
      <label class="detail-description">Votre téléphone</label>
      <input type="text" class="form-control" name="phone">
    </div>
    <button type="submit" class="call-action">Je m'inscris</button>
  </form>
  <p class="header-description">Vous avez deja un compte ? <a class="auth-link" href="/connexion">Je m'identifie</a></p>
</main>