
<?php

    use Core\Database;
    use Core\App;

    $heading = 'Notes';

    $db =App::resolve(Database::class);

    $id = 9;

    $notes = $db->query('Select * from notes where user_id = 9')->getAll();

    view("notes/index.view.php", [
        'heading' => 'Notes',
        'notes' => $notes
    ]);
