<?php

namespace App\Application\Request;

class Request
{
    public function __construct()
    {
    }

    public static function method(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public static function path(): string
    {
        $path = $_SERVER["REQUEST_URI"] ?? false;
        $position = strpos($path, "?");

        if (!$position) return $path;

        return substr($path, 0, $position);
    }

    public static function GET(): array
    {
        $data = [];

        foreach ($_GET as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }

    public static function POST(): array
    {
        $data = [];

        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }
}
