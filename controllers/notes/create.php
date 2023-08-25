<?php

use Core\Database;
use Core\validator;

require basePath('Core/Validator.php');

$config = require basePath('config.php');
$db = new Database($config['Database']);

$error = ['body' => ''];

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if(! Validator::string($_POST['body'],1,200)){
        $error['body'] = 'String no greater than 200 words is required.';

    }

    if(!$error['body']){
        $result = $db->query("Insert Into notes(body, user_id) VALUES (:body, :user_id)",[
            'body' => $_POST['body'],
            'user_id' => 9,
        ]);
    }


}

view("notes/create.view.php", [
    'heading' => 'Create New Note',
    'error' => $error
]);
