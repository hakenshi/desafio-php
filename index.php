<?php
session_start();
require __DIR__ . "/vendor/autoload.php";
use App\controllers\UserController;


$action = $_GET['action'] ?? null;

if (!isset($action)) {
    header("Location: resources/views/login-formulario.php");
    exit();
}
$controller = new UserController();

echo $controller->$action();

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Method not found";
}

