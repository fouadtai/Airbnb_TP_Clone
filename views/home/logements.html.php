<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos logements</title>
</head>

<body>
    <?php include '_navbar.html.php'; ?>
    <h1><?= $h1 ?></h1>
    <?php if (!empty($logements)) : ?>
        <ul>
            <?php foreach ($logements as $logement) : ?>
                <li><?= $logement->title ?> - <?= $logement->price_per_night ?>€/nuit</li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun logement trouvé.</p>
    <?php endif; ?>
</body>

</html>