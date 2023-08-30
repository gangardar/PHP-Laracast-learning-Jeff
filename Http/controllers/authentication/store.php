<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$db = App::resolve(Database::class);

$error = [];
if (!Validator::email($email)) {
    $error['email'] = "The email should be a valid address";
}

if (!Validator::string($password,7,255)){
    $error['password'] = 'The passsword should be more than 7 characters';
}

if(!empty($error)){
    return view('authentication/create.view.php',[
        'heading' => 'Error while validating',
        'error' => $error
    ]);
}


$result = $db->query('Select * from users where email = :email',[
    'email' => $email
])->find();

if($result){


    header('location: /');
    die();
}else {
    $db->query('insert into users(email, password) Values(:email, :password)',[
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login([
        'email' => $email
    ]);


    header('location: /');
    die();
}



