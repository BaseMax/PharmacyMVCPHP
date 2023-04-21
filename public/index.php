<?php

include_once __DIR__ . "/../vendor/autoload.php";


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use App\Application\Application;

$app = new Application();

require_once __DIR__ . "/../app/Routes.php";

echo $app->run();
