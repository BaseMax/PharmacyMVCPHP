<?php

namespace App\Application\Facades;

class Params
{
    public static function check(string $path, string $uri)
    {
        $pattern = "/{(\w+)}/";

        preg_match_all($pattern, $path, $matches);
    }
}
