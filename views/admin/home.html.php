<!-- views/admin/home.php -->

<?php include VIEW_PATH . 'partials/header.php'; ?>

<div class="container">
    <h2>Page d'accueil de l'administrateur</h2>
    <p>Bienvenue, <?= $_SESSION['admin_username'] ?>!</p>
    
    <!-- Affichage des messages de formulaire (succès ou échec) -->
    <?php if (!empty($form_result)) : ?>
        <div class="alert <?= $form_success ? 'alert-success' : 'alert-danger' ?>" role="alert">
            <?= $form_result ?>
        </div>
    <?php endif; ?>

    <!-- Contenu de la page d'accueil -->
    <p>Contenu de la page d'accueil...</p>
</div>

<?php include VIEW_PATH . 'partials/footer.php'; ?>
