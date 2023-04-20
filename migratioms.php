<?php

include_once __DIR__ . "/vendor/autoload.php";


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

list($DB_NAME, $DB_PASSWORD, $DB_USER, $DB_HOST) = array($_ENV["DB_NAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_USER"], $_ENV["DB_HOST"]);

$db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);

function create_orders_table()
{
    global $db;

    $sql = "CREATE TABLE orders (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `user_id` INT NOT NULL,
        `address` TEXT NOT NULL,
        `drug_id` INT,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (drug_id) REFERENCES drugs(id)
        );";

    return ($db->prepare($sql))->execute();
}

function create_users_table()
{
    global $db;

    $sql = "CREATE TABLE users (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `email` VARCHAR(255) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `token` TEXT NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY email (email)
    );";

    return ($db->prepare($sql))->execute();
}

function create_drugs_table()
{
    global $db;

    $sql = "CREATE TABLE drugs (
        `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(100) NOT NULL,
        `price` DECIMAL(10,2) NOT NULL,
        UNIQUE KEY name (name)
        );";

    return ($db->prepare($sql))->execute();
}

echo "--- migrating drugs table ---" . PHP_EOL;
create_drugs_table();
echo "--- drugs table created successfuly ---" . PHP_EOL;
echo "--- migrating users table ---" . PHP_EOL;
create_users_table();
echo "--- users table created successfuly ---" . PHP_EOL;
echo "--- migrating orders table ---" . PHP_EOL;
create_orders_table();
echo "--- orders table created successfuly ---" . PHP_EOL;
