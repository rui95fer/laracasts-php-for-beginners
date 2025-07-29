<?php

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

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}