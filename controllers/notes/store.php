<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db =App::resolve(Database::class);

$error = [];

    if(! Validator::string($_POST['body'],1,200)){
        $error['body'] = 'String no greater than 200 words is required.';

    }

    if(! empty($error)){
        view("notes/create.view.php", [
            'heading' => 'Create New Note',
            'error' => $error
        ]);
    }


    $result = $db->query("Insert Into notes(body, user_id) VALUES (:body, :user_id)",[
        'body' => $_POST['body'],
        'user_id' => 9,
    ]);

    header('location: /notes');

    die();
