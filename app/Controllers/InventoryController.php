<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Response\Response;
use App\Models\User;

class InventoryController extends Controller
{
    public function index()
    {
        // return Response::json([
        //     "status" => "Ok"
        // ]);

        return Response::json(User::get(1));
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
