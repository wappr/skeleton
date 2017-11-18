<?php

namespace wappr\Providers;

use Silex\Application;
use wappr\Contracts\Providers\ValidationInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ValidationProvider implements ValidationInterface
{
    private $validator;

    public function __construct(Application $app)
    {
        $this->validator = $app['validator'];
    }

    public function isEmail($email)
    {
        $errors = $this->validator->validate($email, new Assert\Email());

        if (count($errors) > 0) {
            return false;
        }

        return true;
    }

    public function isStrongPassword($password)
    {
        if (strlen($password) < 8) {
            return false;
        }

        return true;
    }
}
