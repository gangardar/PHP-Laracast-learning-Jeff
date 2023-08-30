<?php


$router->get('/', 'index.php');
$router->get('/about', 'about.php');

$router->get('/notes', 'notes/index.php')->only('auth');

$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/note/edit', 'notes/edit.php');

$router->get('/note/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');
$router->patch('/note', 'notes/update.php');

$router->get('/contact', 'contact.php');

$router->get('/register' , 'authentication/create.php')->only('guest');
$router->post('/register' , 'authentication/store.php');

$router->get('/login' , 'session/login.php')->only('guest');
$router->post('/login' , 'session/store.php')->only('guest');

$router->delete('/session', 'session/destroy.php')->only('auth');



