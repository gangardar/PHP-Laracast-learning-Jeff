<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class){
   $class = str_replace('\\', '/', $class);

    require basePath("{$class}.php");
});

$router = new \Core\Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ;

$routes = require basePath('routes.php');

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri,$method);









