<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$attributes = [
    'email' => $_POST['email'] ?? '',
    'password' => $_POST['password'] ?? '',
];

$form = LoginForm::validate($attributes);
$auth = new Authenticator();

if (!$auth->attempt($attributes['email'], $attributes['password'])) {
    $form->error('email', 'No user found with that email and password combination')->throw();
}

redirect('/');
