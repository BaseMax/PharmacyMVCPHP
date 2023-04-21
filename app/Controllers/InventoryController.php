<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Response\Response;
use App\Models\Drug;

class InventoryController extends Controller
{
    public function index()
    {
        return Response::json(Drug::get());
    }

    public function show(int $id)
    {
        return Response::json(Drug::get($id));
    }

    public function store()
    {
        $data = Request::POST();

        return Response::json(Drug::create(array_keys($data), array_values($data)));
    }

    public function update(int $id)
    {
        $data = Request::PUT();

        return Response::json(Drug::update($id, array_keys($data), array_values($data)));
    }

    public function destroy(int $id)
    {
        if (Drug::delete($id)) return Response::json(["detail" => "user deleted successfuly"]);
        Response::statusCode(404);
        return Response::json(["detail" => "user not found."]);
    }
}
