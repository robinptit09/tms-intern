<?php

namespace App\Services;

use Sentinel;
use App\Interfaces\ExamRepositoryInterface as ExamRepository;

class UserService extends BaseService
{

    protected $examRepository;

    public function __construct(
        ExamRepository $examRepository
    ){
        $this->examRepository = $examRepository;
    }

    public function create()
    {
        return Sentinel::registerAndActivate(array(
            'email'    => 'conan989hd@gmail.com',
            'password' => '123456',
            'permissions' => ['admin' => true],
            'first_name' => 'Quân',
            'last_name'  => 'Nguyễn',
        ));
    }

    public function checkLogin()
    {
        return Sentinel::check();
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

    public function register($data)
    {
        return Sentinel::registerAndActivate($data);
    }

    public function ExamsByCourse($id)
    {
        return $this->examRepository->findWhere(['idCourse' => $id , 'status' => true]);
    }

    public function findExam($id)
    {
        return $this->examRepository->find($id);
    }
}