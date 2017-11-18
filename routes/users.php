<?php
// User routes
use Symfony\Component\HttpFoundation\Request;

$app->get('/admin/', function() use ($app) {
    return 'hi';
});

$app->match('/login/', function(Request $request) use ($app) {
    return $app['twig']->render('login.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
});
