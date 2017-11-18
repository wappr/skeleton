<?php

$app['user.registration'] = function() use($app) {
    return new wappr\Controllers\RegistrationController($app);
};
