<?php

namespace App\Http\Controllers\Admin;

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

    public function getLogin()
    {
        if ($user = $this->userService->checkLogin())
        {
            return redirect()->route('index_admin');
        }
        else
        {
            return view('admin.login');
        }
    }

    public function getCreate()
    {
        $this->userService->create();
    }

    public function postLogin(LoginRequest $request)
    {
        $user = $this->userService->login($request->email, $request->password);
       if($user) {
          if($user->hasAccess('admin')){
              return redirect()->route('index_admin');
          } else {
              $this->userService->logout();
              session()->flash('message', 'Login failed!');
              return redirect()->back();
          }
       }
       else {
            session()->flash('message', 'Login failed!');
            return redirect()->back();
        }

    }

    public function getLogout()
    {
        $this->userService->logout();
        return view('admin.login');
    }
}
