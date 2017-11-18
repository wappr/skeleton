<?php

use Silex\Route;
use wappr\Repositories\UserRepository;
use wappr\Controllers\RegistrationController;
use wappr\Controllers\LoginController;

$app['user.registration'] = function() use($app) {
    return new RegistrationController(new UserRepository, $app);
};
$app['user.login'] = function() use($app) {
    return new LoginController($app);
};

class MyRoute extends Route
{
    use Route\SecurityTrait;
}

$app['route_class'] = 'MyRoute';