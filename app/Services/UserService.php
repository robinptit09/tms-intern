<?php

namespace App\Services;

use App\Criteria\ExamCriteria;
use Illuminate\Http\Request;
use App\Criteria\QuestionCriteria;
use Sentinel;
use App\Interfaces\ExamRepositoryInterface as ExamRepository;
use App\Interfaces\QuestionRepositoryInterface as QuestionRepository;
use App\Interfaces\AnswerRepositoryInterface as AnswerRepository;
use App\Interfaces\UserRepositoryInterface as UserRepository;
use App\Interfaces\ActionUsersRepositoryInterface as ActionUsersRepository;

class UserService extends BaseService
{

    private $userRepository;

    protected $examRepository;

    public function __construct(
        ExamRepository $examRepository,
        AnswerRepository $answerRepository,
        QuestionRepository $questionRepository,
        UserRepository $userRepository,
        ActionUsersRepository $actionUsersRepository
    )
    {
        $this->examRepository = $examRepository;
        $this->answerRepository = $answerRepository;
        $this->questionRepository = $questionRepository;
        $this->userRepository = $userRepository;
        $this->actionUsersRepository = $actionUsersRepository;
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


    public function register($data)
    {
        return Sentinel::registerAndActivate($data);
    }

    public function ExamsByCourse()
    {
        $this->examRepository->pushCriteria(app(ExamCriteria::class));

        return $this->examRepository->paginate(2);
    }

    public function findExam($id)
    {
        return $this->examRepository->find($id);
    }

    public function findAction()
    {
        return $this->actionUsersRepository->findWhere(['idUser' => Sentinel::getUser()->id]);
    }

    public function findAnswer($id)
    {
        return $this->answerRepository->findWhere(['idQuestion' => $id]);
    }

    public function checkPoint($data , $id)
    {
        $count = 0;
        if($data == NULL) {
            return $this->actionUsersRepository->create(['idUser' => Sentinel::getUser()->id , 'idExam' => $id, 'point' => 0]);
        }

        foreach ($data as $key => $value) {
            $answers = $this->findAnswer($key);
            if ($this->checkAnswerCorrect($answers, $value)) {
                if ($this->checkAnswerEnough($answers, $value))
                {
                    $count++;
                }
            }
        }

        $question = $this->questionRepository->findWhere(['idExam' => $id])->count();

        $point = round(($count*10)/$question, 2);

        return $this->actionUsersRepository->create(['idUser' => Sentinel::getUser()->id , 'idExam' => $id, 'point' => $point]);

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

    public function findQuestionExam()
    {
        $this->questionRepository->pushCriteria(app(QuestionCriteria::class));

        return $this->questionRepository->paginate(PAGE_SIZE);
    }

    public function editInfoUser($data)
    {
        return Sentinel::update(Sentinel::getUser(), $data);
    }

    public function maxPoint()
    {
        $max = $this->actionUsersRepository->maxPoint('point');
        return $this->actionUsersRepository->findWhere(['point' => $max]);
    }
}

