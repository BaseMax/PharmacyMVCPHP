<?php

include_once __DIR__ . "/../vendor/autoload.php";

use App\Application\Application;

$app = new Application();


// Inventory Endpoints

$app->get("/api/inventory", []);

$app->get("/api/inventory/{id}", []);

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
});

$app->run();
