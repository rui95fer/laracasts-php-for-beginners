<?php

namespace Core;

class Session
{
    public static function put($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        if (array_key_exists($key, $_SESSION['_flash'] ?? [])) {
            return $_SESSION['_flash'][$key];
        }

        return $_SESSION[$key] ?? $default;
    }

    public static function has($key): bool
    {
        return array_key_exists($key, $_SESSION['_flash'] ?? [])
            || array_key_exists($key, $_SESSION);
    }

    public static function flash($key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash(): void
    {
        unset($_SESSION['_flash']);
    }

    public static function flush(): void
    {
        $_SESSION = [];
    }

    public static function destroySession(): void
    {
        $params = session_get_cookie_params();
        $sessionName = session_name();

        static::flush();
        session_destroy();

        setcookie(
            $sessionName,
            '',
            time() - 3600,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
}
