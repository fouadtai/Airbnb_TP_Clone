<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/styles.css">
    <title>List of Logements</title>
</head>

<body>
    <h1>List of Logements</h1>
    <?php if (!empty($logements)) : ?>
        <ul>
            <?php foreach ($logements as $logement) : ?>
                <li>
                    <h2><?= htmlspecialchars($logement['title']) ?></h2>
                    <p>Price per Night: $<?= htmlspecialchars($logement['price_per_night']) ?></p>
                    <p>Type: <?= htmlspecialchars($logement['type']) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No logements found.</p>
    <?php endif; ?>
</body>

</html>