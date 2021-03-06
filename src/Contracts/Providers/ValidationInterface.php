<?php

namespace wappr\Contracts\Providers;

interface ValidationInterface
{
    public function isEmail($email);

    public function isStrongPassword($password);
}
