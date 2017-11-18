<?php

use wappr\Providers\UserProvider;

$app['security.firewalls'] = array(
    'admin' => array(
        'pattern' => '^/admin/',
        'form' => array(
            'login_path' => '/login',
            'check_path' => '/admin/login_check',
            'username_parameter' => '_username',
            'password_parameter' => '_password'
        ),
        'users' => new UserProvider,
        'logout' => array('logout_path' => '/admin/logout', 'invalidate_session' => true),
    )
);
