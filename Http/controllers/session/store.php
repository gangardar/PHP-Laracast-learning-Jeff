<?php


use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$loginForm = new LoginForm;

if (!$loginForm->validate($email, $password)) {
    return view('authentication/login.view.php', [
        'heading' => 'Error while Logining in',
        'error' => $loginForm->getError()
    ]);
}

$auth = new Authenticator();

if ($auth->attempt($email, $password)) {
    redirect('/');
}


return view('authentication/login.view.php', [
    'heading' => 'Error while Logining in',
    'error' => [
        'email' => 'No matching address found this user',
        'password' => 'No match'
    ]
]);
