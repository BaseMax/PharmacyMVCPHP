<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Response\Response;

class InventoryController extends Controller
{
    public function index()
    {
        return Response::json([
            "status" => "Ok"
        ]);
    }

    public function show(int $id)
    {
    }

    public function store()
    {
        return Response::json(Request::POST());
    }

    public function update(int $id)
    {
    }

    public function destroy(int $id)
    {
    }
}
