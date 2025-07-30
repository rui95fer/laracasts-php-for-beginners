<?php

$routes = require 'routes.php';

function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(404);
    }
}

function abort($code): void
{
    http_response_code($code);
    require "views/$code.php";
    exit;
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

routeToController($uri, $routes);