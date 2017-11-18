<?php

namespace wappr\Repositories;

use wappr\Models\User;
use wappr\Contracts\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getByUsername($username)
    {
        return User::where('username', $username)->first();
    }

    public function createUser($username, $password)
    {
        $user = new User;
        $user->username = $username;
        $user->password = $password;
        $user->roles = 'ROLE_NEW';

        return $user->save();
    }

    public function getRoles($username)
    {
        return $this->getByUsername($username)->roles;
    }
}
