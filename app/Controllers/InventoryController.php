<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Response\Response;
use App\Models\User;

class InventoryController extends Controller
{
    public function index()
    {
        return Response::json(User::get());
    }

    public function show(int $id)
    {
        return Response::json(User::get($id));
    }

    public function store()
    {
        $data = Request::POST();

        return Response::json(User::create(array_keys($data), array_values($data)));
    }

    public function update(int $id)
    {
    }

    public function destroy(int $id)
    {
        if (User::delete($id)) return Response::json(["detail" => "user deleted successfuly"]);
        Response::statusCode(404);
        return Response::json(["detail" => "user not found."]);
    }
}
