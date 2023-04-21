<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Response\Response;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        return Response::json(Order::get());
    }

    public function show(int $id)
    {
        return Response::json(Order::get($id));
    }

    public function store()
    {
        $data = Request::POST();

        return Response::json(Order::create(array_keys($data), array_values($data)));
    }

    public function update(int $id)
    {
        $data = Request::PUT();

        return Response::json(Order::update($id, array_keys($data), array_values($data)));
    }

    public function destroy(int $id)
    {
        if (Order::delete($id)) return Response::json(["detail" => "user deleted successfuly"]);
        Response::statusCode(404);
        return Response::json(["detail" => "user not found."]);
    }
}
