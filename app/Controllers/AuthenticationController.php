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
        $data = Request::POST();

        $this->check($data);
    }

    public function register()
    {
        $data = Request::POST();

        return Response::json(User::create(array_keys($data), array_values($data)));
    }
}
