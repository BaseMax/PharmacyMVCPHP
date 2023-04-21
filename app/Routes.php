<?php

use App\Controllers\AuthenticationController;
use App\Controllers\InventoryController;
use App\Controllers\OrdersController;
use App\Application\Response\Response;

// Inventory Endpoints

$app->get("/api/inventory", [InventoryController::class, "index"]);

$app->get("/api/inventory/{id}", [InventoryController::class, "show"]);

$app->post("/api/inventory", [InventoryController::class, "store"]);

$app->put("/api/inventory/{id}", [InventoryController::class, "update"]);

$app->delete("/api/inventory/{id}", [InventoryController::class, "destroy"]);

// Orders Endpoints

$app->get("/api/orders", [OrdersController::class, "index"]);

$app->get("/api/orders/{id}", [OrdersController::class, "show"]);

$app->post("/api/orders", [OrdersController::class, "store"]);

$app->put("/api/orders/{id}", [OrdersController::class, "update"]);

$app->delete("/api/orders/{id}", [OrdersController::class, "destroy"]);

// Authentication Endpoints

$app->post("/api/auth/login", [AuthenticationController::class, "login"]);

$app->post("/api/auth/register", [AuthenticationController::class, "register"]);

// 404

$app->fallback(function () {
    return Response::json([
        "detail" => "Not found."
    ]);
});
