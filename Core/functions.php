<?php


use Core\Respond;

function dd($value){
echo '<pre>';
    var_dump($value);
    echo '</pre>';

die();
}

function isUri($value){

    return $_SERVER['REQUEST_URI'] === $value ;

}

function abort($code=404)
    {
        http_response_code($code);

        require basePath("views/$code.php");
        die();
    }


function authenticated($condition, $status = Respond::FORBIDDEN) {
     if($condition){
        abort($status);
     }
}

function basePath($value){

    return BASE_PATH. $value;

}

function view($value, $attribute = []){

    extract($attribute);

    require basePath("views/".$value);
}


