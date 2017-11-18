<?php

namespace wappr\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use wappr\Contracts\Controllers\ControllerInterface;

class LoginController implements ControllerInterface
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function index(Request $request)
    {
        return $this->app['twig']->render('login.twig', array(
            'error'         => $this->app['security.last_error']($request),
            'last_username' => $this->app['session']->get('_security.last_username'),
            'csrf'          => $this->app['csrf.token_manager']->getToken('token_id'),
        ));
    }
}
