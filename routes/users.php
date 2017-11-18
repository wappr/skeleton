<?php
// User routes
use Symfony\Component\HttpFoundation\Request;

$app->get('/admin/', function() use ($app) {
    return 'hi';
});
$app->get('/login/', function() use ($app) {
    return 'login';
});
