<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
]);