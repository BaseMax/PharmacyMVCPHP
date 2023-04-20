<?php

namespace App\Controllers;

class MainController extends Controller
{
    public function index(int $id)
    {
        return "hello this is index " . $id;
    }

    public function index2()
    {
        return "hello this is index 2";
    }
}
