<?php

namespace App\Controllers;

use App\Models\Order;
use App\Application\Request\Request;
use App\Application\Response\Response;

class OrdersController extends Controller
{
    public function index()
    {
        $token = Request::Token();

        if (!$token || !$this->checkToken($token)) return $this->unauthorized();
        else return Response::json(Order::get());
    }

    public function show(int $id)
    {
        $token = Request::Token();

        if (!$token || !$this->checkToken($token)) return $this->unauthorized();
        else return Response::json(Order::get($id));
    }

    public function store()
    {
        $data = Request::POST();
        $token = Request::Token();

        if (!$token || !$this->checkToken($token)) return $this->unauthorized();
        else return Response::json(Order::create(array_keys($data), array_values($data)));
    }

    public function update(int $id)
    {
        $data = Request::PUT();
        $token = Request::Token();

        if (!$token || !$this->checkToken($token)) return $this->unauthorized();
        else return Response::json(Order::update($id, array_keys($data), array_values($data)));
    }

    public function destroy(int $id)
    {
        $token = Request::Token();

        if (!$token || !$this->checkToken($token)) return $this->unauthorized();
        else if (Order::delete($id)) return Response::json(["detail" => "order deleted successfuly"]);

        Response::statusCode(404);

        return Response::json(["detail" => "order not found."]);
    }
}
