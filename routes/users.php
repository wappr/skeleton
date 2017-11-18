<?php
// User routes
use Symfony\Component\HttpFoundation\Request;

$app->get('/admin/', function() use ($app) {
    return $app['twig']->render('admin.twig');
})->secure('ROLE_ADMIN');

$app->match('/login/', 'user.login:index');
$app->get('/register/', 'user.registration:index');
$app->post('/register/', 'user.registration:store')->bind('_register');
