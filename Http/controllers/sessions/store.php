<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    view('sessions/create.view.php', [
        'errors' => $form->errors(),
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
