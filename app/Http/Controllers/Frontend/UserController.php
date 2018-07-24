<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\LoginRequest;
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
}
