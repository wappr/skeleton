<?php

namespace wappr\Controllers;

use Silex\Application;
use Symfony\Component\Security\Csrf\CsrfToken;
use wappr\Contracts\Controllers\ControllerInterface;
use wappr\Contracts\Controllers\UserControllerInterface;
use wappr\Contracts\Repositories\UserRepositoryInterface;

/**
 * Class UserController
 * @package wappr\Controllers
 */
class UserController implements ControllerInterface, UserControllerInterface
{
    private $userRepository;
    private $app;
    private $validator;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param Application $app
     */
    public function __construct(UserRepositoryInterface $userRepository, Application $app)
    {
        $this->userRepository = $userRepository;
        $this->app = $app;
        $this->validator = $app['validator'];
    }

    /**
     * @param $email
     * @param $password
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login($email, $password)
    {
        $response = $this->userRepository->login($email, $password);

        if(!$response) {
            $this->app['session']->getFlashBag()->add('error', 'Invalid email address or password.');
            return $this->app->redirect('/users/login/');
        }

        $this->app['session']->set('email', $email);

        return $this->app->redirect('/');
    }

    /**
     * @param $email
     * @param $password
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function create($email, $password)
    {
        // validate email and password
        if(!$this->validator->email()->validate($email)) {
            $this->app['session']->getFlashBag()->add('error', 'Invalid email address.');
            return $this->app->redirect('/users/create/');
        }

        if(strlen($password) < 8) {
            $this->app['session']->getFlashBag()->add('error', 'Password is too short.');
            return $this->app->redirect('/users/create/');
        }

        $response = $this->userRepository->create($email, $password);

        if(!$response) {
            $this->app['session']->getFlashBag()->add('error', 'User already exists.');
            $this->app->redirect('/users/create/');
        }

        return $this->app->redirect('/users/login/');
    }

    /**
     * @param $token
     */
    public function checkToken($token)
    {
        $result = $this->app['csrf.token_manager']->isTokenValid(new CsrfToken('token_id', $token));
        if(!$result) {
            $this->app['monolog']->error('Invalid Token');
            die('Invalid Token');
        }
    }
}
