<?php

use wappr\Providers\UserProvider;

$app['security.firewalls'] = array(
    'admin' => array(
        'pattern' => '^/admin/',
        'form' => array(
            'login_path' => '/login',
            'check_path' => '/admin/login_check',
            'username_parameter' => '_username',
            'password_parameter' => '_password',
            'with_csrf' => true,
            'csrf_parameter' => '_csrf',
            'csrf_token_id' => 'token_id',
        ),
        'users' => new UserProvider,
        'logout' => array('logout_path' => '/admin/logout', 'invalidate_session' => true),
    )
);
