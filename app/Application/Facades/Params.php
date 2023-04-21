<?php

namespace App\Application\Facades;

class Params
{
    public static function check(string $path, string $uri): bool|int
    {
        $escapedPath = preg_quote($path, '/');

        $newPath = str_replace("\{id\}", "([^\/]+)", $escapedPath);

        preg_match('/^' . $newPath . '$/', $uri, $matches);

        if ($matches[1]) return $matches[1];
        else return false;
    }

    public static function escape(string $path): string
    {
        $escapedPath = preg_quote($path, '/');

        return str_replace("\{id\}", "([^\/]+)", $escapedPath);
    }

    public static function match(string $path, string $route)
    {
        preg_match('/^' . $route . '$/', $path, $matches);

        if ($matches[1]) return $matches[1];
        else return $matches[0];
    }
}
