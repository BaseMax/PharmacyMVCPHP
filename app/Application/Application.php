<?php

namespace App\Application;

class Application
{
    protected Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function get(string $path, array $callback)
    {
        $this->router->get($path, $callback);
    }

    public function post(string $path, array $callback)
    {
        $this->router->post($path, $callback);
    }

    public function put(string $path, array $callback)
    {
        $this->router->put($path, $callback);
    }

    public function delete(string $path, array $callback)
    {
        $this->router->delete($path, $callback);
    }
}
