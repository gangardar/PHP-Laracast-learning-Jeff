<?php

use Core\App;
use Core\Database;

$db =App::resolve(Database::class);

$currentUser = 1;

$id = $_GET['id'];

$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();
authenticated($note['user_id'] !== $currentUser);


view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'error' => [],
    'note' => $note
]);
