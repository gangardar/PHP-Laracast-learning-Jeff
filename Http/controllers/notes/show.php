
<?php

use Core\Database;
use Core\App;

$db =App::resolve(Database::class);

$currentUser = 1;

$id = $_GET['id'];

$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();
authenticated($note['user_id'] !== $currentUser);


view("notes/show.view.php", [
    'heading' => 'Notes',
    'note' => $note
]);

