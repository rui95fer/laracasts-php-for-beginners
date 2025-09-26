<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$errors = [];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Email is not valid';
}

if (empty($password)) {
    $errors['password'] = 'Password is required';
}

if (!empty($errors)) {
    view('sessions/create.view.php', [
        'errors' => $errors,
    ]);
    exit();
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);

        header('location: /');
        exit();
    }
}

view('sessions/create.view.php', [
    'errors' => [
        'email' => 'Email or password is incorrect'
    ]
]);
exit();
