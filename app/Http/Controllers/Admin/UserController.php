<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Admin\User;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getLogin()
    {
        if ($this->userService->checkLogin()) {
            return redirect()->route('index_admin');
        } else {
            return view('admin.login');
        }
    }

    /**
     *
     */
    public function getCreate()
    {
        return $this->userService->create();
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $user = $this->userService->login($request->email, $request->password);
        if ($user) {
            return redirect()->route('index_admin');
        } else {
            session()->flash('message', 'Login failed!');
            return redirect()->back();
        }

    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout()
    {
        $this->userService->logout();
        return redirect(route('admin_login'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.layout.master');
    }
    public function getlistuser()
    {
        $users = $this->userService->allUser();
        return view('admin.user.listuser', compact('users','question'));
    }
    public function getadduser()
    {
        return view('admin.user.adduser');
    }

    public function store(Request $request)
    {
        $this->userService->addUser($request);

    }
    public function editUser(Request $request)
    {
        $id = $request->id;
        $user = $this->userService->findUser($id);
        return view('admin.user.editUser', compact('user'));

    }
    public function updateUser(Request $request, $id )
    {
        $user = $this->userService->postUserEdit([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email
        ],$id);
        return redirect()->back()->with('message','Sửa thành công!');

    }

    public function getUserDelete($id)
{
    $this->userService->getUserDelete($id);
    return redirect()->back()->with('Xóa thành công!');

}

    public function showUser(Request $request)
    {
        $id = $request->id;
        $user = $this->userService->findUser($id);
        return view('admin.user.viewUser', compact('user'));
    }

}
