<?php


use Core\Authenticator;

use Http\Forms\LoginForm;



$loginForm = LoginForm::validate($attribute = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$auth = new Authenticator();

$signedIn = $auth->attempt($attribute['email'], $attribute['password']);

if (!$signedIn) {
    $loginForm->setError('email', 'No matching address found this user')->throw();
}

redirect('/');