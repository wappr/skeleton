<?php

namespace wappr\Contracts\Repositories;

interface UserRepositoryInterface
{
    public function create($email, $password);

    public function login($email, $password);
}
