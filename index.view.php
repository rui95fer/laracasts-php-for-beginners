<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laracasts: PHP for Beginners</title>
</head>
<body>
<h1>Books</h1>
<ul>
    <?php foreach ($filteredBooks as $book): ?>
        <li>
            <strong><?php echo htmlspecialchars($book['name']); ?></strong> by <?php echo htmlspecialchars($book['author']); ?>
            (<?php echo htmlspecialchars($book['release_year']); ?>) -
            <a href="<?php echo htmlspecialchars($book['purchase_url']); ?>">Purchase</a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>