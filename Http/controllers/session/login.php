<?php

use Core\Session;

view('authentication/login.view.php',[
    'error' => Session::get('error') ?? []
]);