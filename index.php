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

require 'index.view.php';