<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'New Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (Validator::string($_POST['body'], 10, 1000) === false) {
        $errors['body'] = 'The body must be between 1 and 1000 characters.';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

require 'views/notes/create.view.php';