<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laracasts: PHP for Beginners</title>
</head>
<body>
    <?php
        $book = "Learning PHP, MySQL & JavaScript";
        $haveRead = true;

        if ($haveRead) {
            $message = "I have read the book: $book.";
        } else {
            $message = "I have not read the book: $book.";
        }
    ?>
<h1>
    <?php
        echo $message;
    ?>
</h1>
</body>
</html>