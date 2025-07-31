<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'New Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (strlen(trim($_POST['body'])) < 10) {
        $errors['body'] = 'The body must be at least 10 characters long.';
    } elseif (strlen(trim($_POST['body'])) > 1000) {
        $errors['body'] = 'The body must not exceed 1000 characters.';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

require 'views/note-create.view.php';