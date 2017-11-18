<?php

use wappr\Repositories\UserRepository;
use wappr\Controllers\RegistrationController;

$app['user.registration'] = function() use($app) {
    return new RegistrationController(new UserRepository, $app);
};
