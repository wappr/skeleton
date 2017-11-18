<?php
// User routes
use Symfony\Component\HttpFoundation\Request;

$app->get('/admin/', function() use ($app) {
    return $app['twig']->render('admin.twig');
});

$app->match('/login/', function(Request $request) use ($app) {
    return $app['twig']->render('login.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
        'csrf'          => $app['csrf.token_manager']->getToken('token_id'),
    ));
});

$app->get('/register/', function(Request $request) use ($app) {
    return $app['twig']->render('register.twig', [
        'csrf' => $app['csrf.token_manager']->getToken('token_id'),
    ]);
});

$app->post('/register/', function(Request $request) use ($app) {
    
})->bind('_register');
