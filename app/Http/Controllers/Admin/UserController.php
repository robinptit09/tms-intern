<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Admin\User;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

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
        return redirect(route('admin_login'));
    }

    public function index()
    {
        return view('admin.layout.master');
    }
    public function getlistuser()
    {
        $users = $this->userService->allUser();
        return view('user.listuser', compact('users','question'));
    }
    public function getadduser()
    {
        return view('user.adduser');
    }

    public function store(Request $request)
    {
        $this->userService->addUser($request);

    }
//    public function getEditUser($id)
//    {
//        $users = users::find($id);
//        return view('user.editUser');
//
//    }

    public function getUserDelete($id)
    {
       $this->userService->getUserDelete($id);
        return redirect()->back()->with('Xóa thành công!');

    }

}
