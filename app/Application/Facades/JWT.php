<?php

namespace App\Application\Facades;

use Exception;
use Firebase\JWT\JWT as JsonWebToken;
use Firebase\JWT\Key;

class JWT extends Facade
{
    protected static function secret(): string
    {
        return $_ENV["SECRET_KEY"];
    }

    public static function jwt(array $data): string
    {
        $key = self::secret();
        $exp_time = time() + 315360000;

        $jwt = JsonWebToken::encode(
            array_merge($data, [
                "exp" => $exp_time
            ]),
            $key,
            "HS256"
        );

        return $jwt;
    }

    public static function decode(string $jwt)
    {
        try {
            $decoded = JsonWebToken::decode($jwt, new Key(self::secret(), 'HS256'));
        } catch (Exception $e) {
            $decoded = [];
        }

        return $decoded;
    }
}
