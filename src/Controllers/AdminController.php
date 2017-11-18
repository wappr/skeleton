<?php

namespace wappr\Controllers;

use Symfony\Component\HttpFoundation\Request;
use wappr\Contracts\Controllers\ControllerInterface;

class AdminController implements ControllerInterface
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function index(Request $request)
    {
        return $this->app['twig']->render('admin.twig');
    }
}
