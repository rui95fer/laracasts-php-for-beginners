<?php

function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort(404);
    }
}

function abort($code): void
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    exit;
}

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

routeToController($uri, $routes);