<?php

// User routes

use Symfony\Component\HttpFoundation\Request;

$app->get('/users/login/', function() use ($app) {
    return $app['twig']->render('users/login.twig', [
        'csrf' => $app['csrf.token_manager']->getToken('token_id')
    ]);
});

$app->post('/users/login/', function(Request $request) use ($app) {
    $app['users.controller']->checkToken($request->request->get('csrf'));
    return $app['users.controller']->login(
        $app->escape($request->request->get('username')),
        $app->escape($request->request->get('password'))
    );
});

$app->get('/users/create/', function() use ($app) {
    return $app['twig']->render('users/register.twig', [
        'csrf' => $app['csrf.token_manager']->getToken('token_id')
    ]);
});

$app->post('/users/create/', function(Request $request) use ($app) {
    $app['users.controller']->checkToken($request->request->get('csrf'));
    return $app['users.controller']->create(
        $app->escape($request->request->get('username')),
        $app->escape($request->request->get('password'))
    );
});
