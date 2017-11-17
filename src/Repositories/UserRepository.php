<?php

namespace wappr\Repositories;

use wappr\Models\User;
use wappr\Contracts\Repositories\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package wappr\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @param $email
     * @param $password
     * @param int $cost
     * @return bool
     */
    public function create($email, $password, $cost = BCRYPT_COST)
    {
        if(!$this->getByEmail($email)->isEmpty())
        {
            return false;
        }

        User::create(['email' => $email, 'password' => $this->password($password, $cost)]);

        return true;
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password)
    {
        $user = $this->getByEmail($email);

        if($user->isEmpty()) {
            return false;
        }

        return password_verify($password, $user[0]->password);
    }

    /**
     * @param $email
     * @return mixed
     */
    private function getByEmail($email)
    {
        return User::where('email', $email)->get();
    }

    /**
     * @param $password
     * @param $cost
     * @return bool|string
     */
    private function password($password, $cost)
    {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => $cost]);
    }
}
