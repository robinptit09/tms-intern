<?php

namespace App\Services;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

use Sentinel;

class UserService extends BaseService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create()
    {
        Sentinel::registerAndActivate(array(
            'email'    => 'nguyenvanhienptit31@gmail.com',
            'password' => '12345678',
            'permissions' => ['admin' => true],
            'first_name' => 'Hiền',
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

    public function allUser()
    {
        $list = $this->userRepository->all();
        return $list;
    }

    public function addUser(Request $request)
    {
        Sentinel::registerAndActivate($request->all());
    }
    public function getUserDelete($id)
    {
        return $this->userRepository->delete($id);
    }
}