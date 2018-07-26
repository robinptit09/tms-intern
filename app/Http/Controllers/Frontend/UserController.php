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


//    public function getLogin()
//    {
//        if ($user = $this->userService->checkLogin())
//        {
//            return redirect()->route('index_user');
//        }
//        else
//        {
//            return view('user.login');
//        }
//    }

    public function getCreate()
    {
        $this->userService->create();
    }

//    public function postLogin(LoginRequest $request)
//    {
//        $user = $this->userService->login($request->email, $request->password);
//        if($user) {
//            if($user->hasAccess('user')){
//                return redirect()->route('index_user');
//            } else {
//                $this->userService->logout();
//                session()->flash('message', 'Login failed!');
//                return redirect()->back();
//            }
//        }
//        else {
//            session()->flash('message', 'Login failed!');
//            return redirect()->back();
//        }
//
//    }
//
//    public function getLogout()
//    {
//        $this->userService->logout();
//        return view('user.login');
//    }


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

    public function getListExams($id)
    {
        $exams = $this->userService->ExamsByCourse($id);
        $action = $this->userService->checkAction();
        return view('frontend.pages.listexam', compact('exams', 'action'));
    }

    public function getExam($id, Request $request)
    {
        $exam = $this->userService->findExam($id);
        $request->request->add(['idExam' => $id]);
        $questions = $this->userService->findQuestionExam($id);
        return view('frontend.pages.exam', compact('exam','questions'));
    }

    public function postExam(Request $request, $id)
    {
        if ($request->has('answer')) {
            $data = $request->answer;
            $check = $this->userService->checkPoint($data, $id);
            return view('frontend.pages.result',compact('check'));
        } else {
            return redirect()->back();
        }
    }

}
