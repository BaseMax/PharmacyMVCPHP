<?php

namespace App\Application;

use App\Application\Facades\Params;
use App\Application\Request\Request;
use App\Application\Response\Response;

class Router
{

    public array $routes = [
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
        $path = Params::escape($path);
        $this->routes["get"][$path] = $callback;
    }

    public function post(string $path, array $callback)
    {
        $path = Params::escape($path);
        $this->routes["post"][$path] = $callback;
    }

    public function put(string $path, array $callback)
    {
        $path = Params::escape($path);
        $this->routes["put"][$path] = $callback;
    }

    public function delete(string $path, array $callback)
    {
        $path = Params::escape($path);
        $this->routes["delete"][$path] = $callback;
    }

    public function fallback(callable $callback)
    {
        $this->routes["fallback"] = $callback;
    }

    public function execute()
    {
        $method = Request::method();
        $path = Request::path();

        foreach (array_keys($this->routes[$method]) as $route) {
            $param = Params::match($path, $route) ?? [];

            if ($param) {
                $instance = new $this->routes[$method][$route][0];
                $methodForCall = $this->routes[$method][$route][1];
                return call_user_func([$instance, $methodForCall], $param);
            }
        }
        Response::statusCode(404);
        return call_user_func($this->routes["fallback"]);
    }
}
