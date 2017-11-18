<?php
// User routes

$app->match('/login/', 'user.login:index');
$app->get('/register/', 'user.registration:index');
$app->post('/register/', 'user.registration:store')->bind('_register');
