<!-- home/logements.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos logements</title>
</head>

<body>
    <h1><?= $view_data['h1'] ?></h1>
    <?php if (!empty($view_data['logements'])) : ?>
        <ul>
            <?php foreach ($view_data['logements'] as $logement) : ?>
                <li><?= $logement->title ?> - <?= $logement->price_per_night ?>€/nuit</li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun logement trouvé.</p>
    <?php endif; ?>
</body>

</html>