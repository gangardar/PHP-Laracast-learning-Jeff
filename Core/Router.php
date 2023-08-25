<?php

namespace Core;

class Router {
    protected $routes = [];
    public function get($uri, $controller) {

        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET'
        ];

    }

    public function post($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST'
        ];

    }

    public function delete($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE'
        ];

    }

    public function patch($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PATCH'
        ];

    }

    public function put($uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PUT'
        ];

    }

    function route($uri, $method)
    {
        foreach ($this->routes as $route){
            if($route['uri']=== $uri){
                return require basePath($route['controller']);
            }
        }

        $this->abort();
    }

    function abort($code=404)
    {
        http_response_code($code);

        require basePath("views/$code.php");
        die();
    }



}


//
//$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ;
//
//
//$routes = require basePath('routes.php');
//

//
//function routeToController($uri, $routes){
//if(array_key_exists($uri, $routes)){
//require basePath($routes[$uri]);
//}else{
//abort(404);
//}
//}
//
//routeToController($uri, $routes);