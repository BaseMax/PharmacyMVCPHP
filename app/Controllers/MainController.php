<?php

namespace App\Controllers;

class MainController extends Controller
{
    public function index(int $id)
    {
        return "hello this is index " . $id;
    }
}
