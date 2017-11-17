<?php

use Respect\Validation\Validator;
use wappr\Controllers\UserController;
use wappr\Repositories\UserRepository;

$app['users.repository'] = function () {
    return new UserRepository;
};

$app['users.controller'] = function () use ($app) {
    return new UserController($app['users.repository'], $app);
};

$app['validator'] = function () {
    return new Validator;
};
