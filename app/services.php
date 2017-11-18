<?php

use Silex\Route;
use wappr\Repositories\UserRepository;
use wappr\Controllers\RegistrationController;
use wappr\Controllers\LoginController;
use wappr\Controllers\AdminController;
use wappr\Providers\ValidationProvider;

$app['user.registration'] = function() use($app) {
    return new RegistrationController(new UserRepository, $app);
};
$app['user.login'] = function() use($app) {
    return new LoginController($app);
};
$app['admin'] = function() use($app) {
    return new AdminController($app);
};
$app['wappr_validator'] = function() use($app) {
    return new ValidationProvider($app);
};

class MyRoute extends Route
{
    use Route\SecurityTrait;
}

$app['route_class'] = 'MyRoute';
