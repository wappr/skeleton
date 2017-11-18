<?php

namespace wappr\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use wappr\Contracts\Controllers\ControllerInterface;
use wappr\Contracts\Repositories\UserRepositoryInterface;
use wappr\Contracts\Providers\ValidationInterface;

class RegistrationController implements ControllerInterface
{
    private $user;
    private $app;

    public function __construct(
        UserRepositoryInterface $user,
        Application $app,
        ValidationInterface $validator
        )
    {
        $this->user = $user;
        $this->app = $app;
        $this->validator = $validator;
    }

    public function index(Request $request)
    {
        return $this->app['twig']->render('register.twig', [
            'csrf' => $this->app['csrf.token_manager']->getToken('token_id'),
        ]);
    }

    public function store(Request $request)
    {
        $username = $request->get('_username');
        $password = $request->get('_password');

        $valid = $this->isValid($username, $password);
        if(!$valid) {
            return $this->app->redirect('/register/');
        }

        if (null != $this->user->getByUsername($username)) {
            $this->app['session']->getFlashBag()->add('error', 'User already exists.');

            return $this->app->redirect('/register/');
        }

        $password = $this->app['security.default_encoder']->encodePassword($password, '');

        $this->user->createUser($username, $password);

        return $this->app->redirect('/login/');
    }

    private function isValid($email, $password)
    {
        if(!$this->validator->isEmail($email)) {
            $this->app['session']->getFlashBag()->add('error', 'Invalid email address.');

            return false;
        }

        if(!$this->validator->isStrongPassword($password)) {
            $this->app['session']->getFlashBag()->add('error', 'Password must be 8 characters.');

            return false;
        }

        return true;
    }
}
