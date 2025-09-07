<?php

namespace Core\Middleware;

use Exception;

class Middleware
{
    public const array MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public static function resolve($key): void
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? null;

        if (!$middleware) {
            throw new Exception("Middleware $key not found.");
        }

        new $middleware->handle();
    }
}