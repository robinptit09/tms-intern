<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\InfoUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Sentinel;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getCreate()
    {
        $this->userService->create();
    }

    public function index()
    {
        return view('frontend.pages.index');
    }

    public function getRegister()
    {
        return view('frontend.pages.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $data = [
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = $this->userService->register($data);
        return redirect()->route('login');
    }

    public function getLogin()
    {
        if ($user = $this->userService->checkLogin()) {
            return redirect()->route('index');
        } else {
            return view('frontend.pages.login');
        }
    }

    public function postLogin(LoginRequest $request)
    {
        $user = $this->userService->login($request->email, $request->password);
        if ($user) {
            return redirect()->route('index');
        } else {
            session()->flash('message', 'Login failed!');
            return redirect()->back();
        }
    }

    public function getLogout()
    {
        $this->userService->logout();
        return redirect(route('login'));
    }

    public function getListExams($id, Request $request)
    {
        $request->request->add(['ic' => $id]);
        $exams = $this->userService->ExamsByCourse();
        $action = $this->userService->findAction();
        $maxPoint = $this->userService->maxPoint();
        return view('frontend.pages.listexam', compact('exams', 'action','maxPoint','id'));
    }

    public function getExam($id, Request $request)
    {
        $exam = $this->userService->findExam($id);
        $request->request->add(['idExam' => $id]);
        $questions = $this->userService->findQuestionExam();
        return view('frontend.pages.exam', compact('exam', 'questions'));
    }

    public function postExam(Request $request, $id)
    {
        $data = $request->answer;
        $check = $this->userService->checkPoint($data, $id);
        return view('frontend.pages.result', compact('check'));
    }

    public function getInfoUser()
    {
        $actions = $this->userService->findAction();
        return view('frontend.pages.infoUser', compact('actions'));
    }

    public function getEditInfoUser()
    {
        return view('frontend.pages.editInfoUser');
    }

    public function postEditInfoUser(InfoUserRequest $request)
    {
        $data = [
            'first_name' => $request->first_name,
            'password' => $request->password
        ];
        $user = $this->userService->editInfoUser($data);
        return redirect()->back()->with('message', 'Thay đổi thông tin thành công!');
    }
}
