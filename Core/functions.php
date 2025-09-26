<?php

use Core\Response;

function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit;
}

function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN): bool
{
    if (!$condition) {
        abort($status);
    }

    return true;
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function abort($code = 404): void
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}