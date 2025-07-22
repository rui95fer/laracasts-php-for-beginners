<?php

require 'functions.php';
// require 'router.php';

// Connect to our MySQL database
$dsn = 'mysql:host=localhost;dbname=laracasts-php-for-beginners;user=root;charset=utf8mb4';
$pdo = new PDO($dsn);

$statement = $pdo->prepare('SELECT * FROM posts');
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<h1>{$post['title']}</h1>";
    echo "<hr>";
}