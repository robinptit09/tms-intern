<?php

namespace App\Services;

use Sentinel;

class UserService extends BaseService
{

    public function create()
    {
        Sentinel::registerAndActivate(array(
            'email'    => 'conan989hd@gmail.com',
            'password' => '123456',
            'first_name' => 'Quân',
            'last_name'  => 'Nguyễn',
        ));
    }

    public function checkLogin()
    {
        if (Sentinel::check())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function login($email, $password)
    {
        return Sentinel::authenticate([
            'email'    => $email,
            'password' => $password,
        ]);
    }

    public function logout()
    {
        return Sentinel::logout();
    }

}