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

function filterBooksByAuthor($books, $author): array
{
    return array_filter($books, function ($book) use ($author) {
        return $book['author'] === $author;
    });
}
?>

<?php
$author = 'John Doe';

$filteredBooks = filterBooksByAuthor($books, $author);

if (!empty($filteredBooks)) {
    echo "<ul>";
    foreach ($filteredBooks as $book) {
        echo "<li>";
        echo "<strong>" . htmlspecialchars($book['name']) . "</strong> by " . htmlspecialchars($book['author']) . " (Released: " . htmlspecialchars($book['release_year']) . ")";
        echo " - <a href='" . htmlspecialchars($book['purchase_url']) . "'>Purchase</a>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No books found by author: " . htmlspecialchars($author) . "</p>";
}
?>

</body>
</html>