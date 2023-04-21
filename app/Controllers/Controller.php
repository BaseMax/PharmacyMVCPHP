<?php

namespace App\Controllers;

use App\Application\Facades\JWT;
use App\Application\Response\Response;
use App\Models\User;

class Controller
{
    protected function unauthorized()
    {
        Response::statusCode(401);
        return Response::json([
            "detail" => "Unauthorized"
        ]);
    }

    protected function check(array $data)
    {
        if (User::check($data["email"], $data["password"])) {
            return Response::json([
                "token" => JWT::jwt($data)
            ]);
        }

        return $this->unauthorized();
    }

    protected function checkToken(string $token): bool
    {
        $data = JWT::decode($token);

        if (User::check($data->email, $data->password)) return true;
        return false;
    }
}
