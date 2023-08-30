<?php


use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$loginForm = new LoginForm;

if ($loginForm->validate($email, $password)) {
    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect('/');
    } 
    
    $loginForm->setError('email','No matching address found this user');
    
}


Session::flash('error', $loginForm->getError());

return redirect('/login');



