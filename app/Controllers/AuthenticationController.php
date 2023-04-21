<?php

namespace App\Controllers;

use App\Application\Facades\JWT;
use App\Application\Request\Request;
use App\Application\Response\Response;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function login()
    {
        // var_dump("Ok");
        var_dump(JWT::jwt([
            "name" => "ali",
            "family" => "ahmadi"
        ]));
    }

    public function register()
    {
        $data = Request::POST();

        return Response::json(User::create(array_keys($data), array_values($data)));
    }
}
