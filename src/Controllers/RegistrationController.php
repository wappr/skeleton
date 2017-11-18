<?php

namespace wappr\Controllers;

use Silex\Application;
use wappr\Contracts\Controllers\ControllerInterface;

class RegistrationController implements ControllerInterface
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function index()
    {
        return $this->app['twig']->render('register.twig', [
            'csrf' => $this->app['csrf.token_manager']->getToken('token_id'),
        ]);
    }
}
