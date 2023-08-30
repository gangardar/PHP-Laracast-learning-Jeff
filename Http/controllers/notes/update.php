<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db =App::resolve(Database::class);

$currentUser = 1;

$error = [];

$id = $_POST['id'];

$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();
authenticated($note['user_id'] !== $currentUser);

    if(! Validator::string($_POST['body'],1,200)){
        $error['body'] = 'String no greater than 200 words is required.';

    }

    if(! empty($error)){
        view("notes/edit.view.php", [
            'heading' => 'Re-edit your note',
            'error' => $error,
            'note' => $note
        ]);
    }

    $db->query('Update notes set body = :body where id = :id', [
        'id' => $_POST['id'],
        'body' => $_POST['body']
    ]);

    header('location: /notes');
    die();
