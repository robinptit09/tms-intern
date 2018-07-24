<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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
        if ($user = $this->userService->checkLogin())
        {
            return redirect()->route('index');
        }
        else
        {
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

    public function getListExams($id)
    {
        $exams = $this->userService->ExamsByCourse($id);

        return view('frontend.pages.listexam', compact('exams'));
    }

    public function getExam($id)
    {
        $exam = $this->userService->findExam($id);
        return view('frontend.pages.exam', compact('exam'));
    }
     public function test(Request $request)
     {
         $data = $request->answer;
         dd($data);
     }

}
