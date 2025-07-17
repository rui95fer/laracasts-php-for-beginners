<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($business['name']) ?>: PHP for Beginners</title>
</head>
<body>
<h1><?= htmlspecialchars($business['name']) ?></h1>
<img src="<?= htmlspecialchars($business['image']) ?>" alt="<?= htmlspecialchars($business['name']) ?>" width="200">

<p><strong>Cost:</strong> $<?= htmlspecialchars($business['cost']) ?></p>
<p><strong>Description:</strong> <?= htmlspecialchars($business['description']) ?></p>
<p>
    <strong>Website:</strong>
    <a href="<?= htmlspecialchars($business['url']) ?>" target="_blank">
        <?= htmlspecialchars($business['url']) ?>
    </a>
</p>
<p>
    <strong>Tags:</strong>
    <?php foreach ($business['tags'] as $tag): ?>
        <span><?= htmlspecialchars($tag) ?></span>
    <?php endforeach; ?>
</p>
<p><strong>Categories:</strong></p>
<ul>
    <?php foreach ($business['categories'] as $category): ?>
        <li><?= htmlspecialchars($category) ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>