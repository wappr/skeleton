<?php

namespace wappr\Contracts\Controllers;

interface UserControllerInterface
{
    public function login($email, $password);

    public function create($email, $password);
}
