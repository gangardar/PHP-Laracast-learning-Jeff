<?php

use Core\Session;
use Core\ValidationExpection;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);

    require basePath("{$class}.php");
});

require basePath('bootstrap.php');

$router = new \Core\Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require basePath('routes.php');

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try{
    $router->route($uri, $method);
} catch(ValidationExpection $expection){
    Session::flash('error', $expection->error);
    Session::flash('old', $expection->old);

    return $router->back();
}



Session::unflash();