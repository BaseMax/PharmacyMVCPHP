<?php

namespace App\Application\Response;

class Response
{
    public static function json(array $data): string
    {
        header('Content-Type: application/json');

        return json_encode($data);
    }

    public static function statusCode(int $status = 200): void
    {
        http_response_code($status);
    }
}
