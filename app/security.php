<?php

use wappr\Providers\UserProvider;

$app['security.firewalls'] = array(
    'admin' => array(
        'pattern' => '^/admin/',
        'form' => array('login_path' => '/login', 'check_path' => '/admin/'),
        'users' => function () use ($app) {
            return new UserProvider;
        },
        'logout' => array('logout_path' => '/admin/logout', 'invalidate_session' => true)
    ),
    'agent' => array(
        'pattern' => '^/agent/',
        'form' => array('login_path' => '/login', 'check_path' => '/agent/'),
        'users' => function () use ($app) {
            return new UserProvider;
        },
        'logout' => array('logout_path' => '/agent/logout', 'invalidate_session' => true)
    )
);
