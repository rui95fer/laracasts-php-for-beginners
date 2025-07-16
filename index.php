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
        'purchase_url' => 'https://example.com/php-for-beginners',
        'release_year' => 2021
    ],
    [
        'name' => 'Learning PHP',
        'author' => 'Jane Smith',
        'purchase_url' => 'https://example.com/learning-php',
        'release_year' => 2020
    ],
    [
        'name' => 'Advanced PHP Programming',
        'author' => 'Alice Johnson',
        'purchase_url' => 'https://example.com/advanced-php-programming',
        'release_year' => 2019
    ],
    [
        'name' => 'Mastering PHP',
        'author' => 'John Doe',
        'purchase_url' => 'https://example.com/mastering-php',
        'release_year' => 2021
    ],
];

$filteredBooks = array_filter($books, function ($book) {
    return $book['release_year'] >= 2020;
});
?>

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