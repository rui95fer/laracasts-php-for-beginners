<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Email is not valid';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Password must be at least 7 characters';
}

if (!empty($errors)) {
    view('registration/create.view.php', [
        'errors' => $errors,
    ]);
    exit();
}

$db = App::resolve(Database::class);
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    $errors['email'] = 'Email is already taken';

    view('registration/create.view.php', [
        'errors' => $errors,
    ]);

} else {
    $db->query('insert into users (email, password) values (:email, :password)', [
        'email' => $email,
        'password' => $password,
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
}
exit();