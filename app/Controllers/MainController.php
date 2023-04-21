<?php

namespace App\Controllers;

class MainController extends Controller
{
    public function index(int $id)
    {
        return "Hello, Here is index " . $id;
    }
}
