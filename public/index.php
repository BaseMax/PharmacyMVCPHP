<?php

include_once __DIR__ . "/../vendor/autoload.php";

use App\Application\Application;
use App\Controllers\MainController;

$app = new Application();


// Inventory Endpoints

$app->get("/api/inventory", [MainController::class, "index2"]);

$app->get("/api/inventory/{id}", [MainController::class, "index"]);

$app->post("/api/inventory", []);

$app->put("/api/inventory/{id}", []);

$app->delete("/api/inventory/{id}", []);




// Orders Endpoints

$app->get("/api/orders", []);

$app->get("/api/orders/{id}", []);

$app->post("/api/orders", []);

$app->put("/api/orders/{id}", []);

$app->delete("/api/orders/{id}", []);




// Authentication Endpoints

$app->post("/api/auth/login", []);

$app->post("/api/auth/register", []);




$app->fallback(function () {
    return "Not Found";
});

echo $app->run();
