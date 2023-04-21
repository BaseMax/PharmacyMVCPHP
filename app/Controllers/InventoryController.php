<?php

namespace App\Controllers;

use App\Models\Drug;
use App\Application\Request\Request;
use App\Application\Response\Response;

class InventoryController extends Controller
{
    public function index()
    {
        $token = Request::Token();

        if (!$token || !$this->checkToken($token)) return $this->unauthorized();
        else return Response::json(Drug::get());
    }

    public function show(int $id)
    {
        $token = Request::Token();

        if (!$token || !$this->checkToken($token)) return $this->unauthorized();
        else return Response::json(Drug::get($id));
    }

    public function store()
    {
        $data = Request::POST();
        $token = Request::Token();

        if (!$token || !$this->checkToken($token)) return $this->unauthorized();
        else return Response::json(
                Drug::create(
                    array_keys($data),
                    array_values($data)
                )
            );
    }

    public function update(int $id)
    {
        $data = Request::PUT();
        $token = Request::Token();

        if (!$token || !$this->checkToken($token)) return $this->unauthorized();
        else return Response::json(Drug::update($id, array_keys($data), array_values($data)));
    }

    public function destroy(int $id)
    {
        $token = Request::Token();

        if (!$token || !$this->checkToken($token)) return $this->unauthorized();
        else if (Drug::delete($id)) return Response::json(["detail" => "user deleted successfuly"]);

        Response::statusCode(404);

        return Response::json(["detail" => "user not found."]);
    }
}
