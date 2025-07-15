<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laracasts: PHP for Beginners</title>
</head>
<body>
<h1>Books</h1>
<?php
$books = [
    [
        'name' => 'PHP for Beginners',
        'author' => 'John Doe',
        'purchase_url' => 'https://example.com/php-for-beginners'
    ],
    [
        'name' => 'Learning PHP',
        'author' => 'Jane Smith',
        'purchase_url' => 'https://example.com/learning-php'
    ],
    [
        'name' => 'Advanced PHP Programming',
        'author' => 'Alice Johnson',
        'purchase_url' => 'https://example.com/advanced-php-programming'
    ]
];
?>

<ul>
    <?php foreach ($books as $book): ?>
        <li>
            <strong><?php echo htmlspecialchars($book['name']); ?></strong>
            by <?php echo htmlspecialchars($book['author']); ?>
            - <a href="<?php echo htmlspecialchars($book['purchase_url']); ?>">Purchase</a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>