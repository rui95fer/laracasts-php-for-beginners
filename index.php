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
    "PHP for Beginners",
    "Learning PHP, MySQL & JavaScript",
    "Modern PHP Development"
];
?>

<ul>
    <?php
    foreach ($books as $book) {
        echo "<li>" . htmlspecialchars($book) . "</li>";
    }
    ?>
</ul>
</body>
</html>