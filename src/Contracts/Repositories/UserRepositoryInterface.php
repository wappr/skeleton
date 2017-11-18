<?php

namespace wappr\Contracts\Repositories;

interface UserRepositoryInterface
{
    public function getByUsername($username);

    public function createUser($username, $password);

    public function getRoles($username);
}
