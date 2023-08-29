<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$db = App::resolve(Database::class);


$error = [];
if (!Validator::email($email)) {
    $error['email'] = "The email should be your valid email address";
}

if (!Validator::string($password,7,255)){
    $error['password'] = 'Provide a valid password';
}

if(!empty($error)){
    return view('authentication/login.view.php',[
        'heading' => 'Error while Logining in',
        'error' => $error
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user){

    if(password_verify($password, $user['password'])){
        login([
        'email' => $email
    ]);

    header('location: /notes');
    exit();
}
}



return view('authentication/login.view.php',[
    'heading' => 'Error while Logining in',
    'error' => [
        'email' => 'No matching address found this user',
        'password' => 'No match'
    ]
]);



