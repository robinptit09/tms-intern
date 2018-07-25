<?php

namespace App\Services;

use Sentinel;
use App\Interfaces\ExamRepositoryInterface as ExamRepository;
use App\Interfaces\AnswerRepositoryInterface as AnswerRepository;

class UserService extends BaseService
{

    protected $examRepository;

    public function __construct(
        ExamRepository $examRepository,
        AnswerRepository $answerRepository
    )
    {
        $this->examRepository = $examRepository;
        $this->answerRepository = $answerRepository;
    }

    public function create()
    {
        return Sentinel::registerAndActivate(array(
            'email' => 'conan989hd@gmail.com',
            'password' => '123456',
            'permissions' => ['admin' => true],
            'first_name' => 'Quân',
            'last_name' => 'Nguyễn',
        ));
    }

    public function checkLogin()
    {
        return Sentinel::check();
    }

    public function login($email, $password)
    {
        return Sentinel::authenticate([
            'email' => $email,
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
        return $this->examRepository->findWhere(['idCourse' => $id, 'status' => true]);
    }

    public function findExam($id)
    {
        return $this->examRepository->find($id);
    }

    public function findAnswer($id)
    {
        return $this->answerRepository->findWhere(['idQuestion' => $id]);
    }

    public function checkPoint($data)
    {
        $count = 0;
        foreach ($data as $key => $value) {
            $answers = $this->findAnswer($key);
            if ($this->checkAnswerCorrect($answers, $value)) {
                if ($this->checkAnswerEnough($answers, $value))
                {
                    $count++;
                }
            }
        }
        dd($count);
    }

    public function checkAnswerCorrect($answers, $value)
    {
        foreach ($value as $val) {
            $check = 0;
            foreach ($answers as $answer) {
                if ($val == $answer->answer)
                {
                    $check = 1;
                    break;
                }
            }
            if ($check == 0) return false;
        }
        return true;
    }

    public function checkAnswerEnough($answers, $value)
    {
        foreach ($answers as $answer)
        {
            if($this->inArray($value, $answer->answer) == false){
                return false;
            }
        }
        return true;
    }

    public function inArray($arr, $val)
    {
        foreach ($arr as $value)
        {
            if($val == $value) return true;
        }
        return false;
    }
}
