<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];
$db = App::resolve(Database::class);


$loginForm = new LoginForm;

if (!$loginForm->validate($email, $password)) {
    return view('authentication/login.view.php', [
        'heading' => 'Error while Logining in',
        'error' => $loginForm->getError()
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {

    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /notes');
        exit();
    }
}



return view('authentication/login.view.php', [
    'heading' => 'Error while Logining in',
    'error' => [
        'email' => 'No matching address found this user',
        'password' => 'No match'
    ]
]);
