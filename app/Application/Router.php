<?php

namespace App\Application;

class Router
{

    protected array $routes = [
        "get" => [],
        "post" => [],
        "delete" => [],
        "put" => [],
        "fallback"
    ];

    public function __construct()
    {
    }

    public function get(string $path, array $callback)
    {
        $this->routes["get"][$path] = $callback;
    }

    public function post(string $path, array $callback)
    {
        $this->routes["post"][$path] = $callback;
    }

    public function put(string $path, array $callback)
    {
        $this->routes["put"][$path] = $callback;
    }

    public function delete(string $path, array $callback)
    {
        $this->routes["delete"][$path] = $callback;
    }

    public function fallback(callable $callback)
    {
        $this->routes["fallback"] = $callback;
    }
}
