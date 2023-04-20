<?php

namespace App\Config;

class Config
{
    public static function get(): array
    {
        return [
            "DB_NAME"      => $_ENV["DB_NAME"],
            "DB_PASSWORD"  => $_ENV["DB_PASSWORD"],
            "DB_USER"      => $_ENV["DB_USER"],
            "DB_HOST"      => $_ENV["DB_HOST"]
        ];
    }
}
