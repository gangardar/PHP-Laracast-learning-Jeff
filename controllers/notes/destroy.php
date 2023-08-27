
<?php

use Core\App;
use Core\Database;

$db =App::resolve(Database::class);


$currentUser = 9;

$id = $_POST['id'];

$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();
authenticated($note['user_id'] !== $currentUser);


    $db->query("Delete from notes where id = :id",['id' => $id]);

    header('location: /notes');

    exit();

