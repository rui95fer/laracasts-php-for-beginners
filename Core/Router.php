<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected array $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if (isset($route['middleware'])) {
                    $middleware = Middleware::MAP[$route['middleware']];
                    (new $middleware)->handle();
                }

                return require base_path("http/controllers/{$route['controller']}");
            }
        }

        $this->abort();
    }

    public function previousUrl(): string
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? '';
        $currentHost = $_SERVER['HTTP_HOST'] ?? '';
        $refererParts = parse_url($referer);
        $currentHostParts = parse_url('http://' . $currentHost);

        if (!is_array($refererParts) || !is_array($currentHostParts)) {
            return '/login';
        }

        $refererHost = $refererParts['host'] ?? '';
        $requestHost = $currentHostParts['host'] ?? '';
        $path = $refererParts['path'] ?? '';
        $query = $refererParts['query'] ?? null;

        if (
            !in_array(strtolower($refererParts['scheme'] ?? ''), ['http', 'https'], true)
            || $refererHost === ''
            || $requestHost === ''
            || strcasecmp($refererHost, $requestHost) !== 0
            || $path === ''
            || $path[0] !== '/'
            || str_starts_with($path, '//')
            || str_contains($path, '\\')
            || preg_match('/[\r\n]/', $query ?? '')
        ) {
            return '/login';
        }

        return $path . ($query !== null ? '?' . $query : '');
    }

    public function abort($code = 404): void
    {
        http_response_code($code);
        require base_path("views/$code.php");
        die();
    }
}
