
<?php

    use Core\Database;

    $heading = 'Notes';

    $config = require basePath('config.php');
    $db = new Database($config['Database']);

    $id = 9;

    $notes = $db->query('Select * from notes where user_id = 9')->getAll();

    view("notes/index.view.php", [
        'heading' => 'Notes',
        'notes' => $notes
    ]);
