
<?php

use Core\Database;

$heading = 'Notes';

$config = require basePath('config.php');

$currentUser = 9;

$db = new Database($config['Database']);

$id = $_GET['id'];

$note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();
authenticated($note['user_id'] !== $currentUser);

if ($_SERVER["REQUEST_METHOD"] === 'POST'){


    $db->query("Delete from notes where id = :id",['id' => $id]);

    header('location: /notes');

    exit();

}else{
    $note = $db->query("select * from notes where id = :id", ['id' => $id])->findOrFail();

    authenticated($note['user_id'] !== $currentUser);
}


view("notes/show.view.php", [
    'heading' => 'Notes',
    'note' => $note
]);

