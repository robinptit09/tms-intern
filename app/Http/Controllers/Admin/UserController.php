<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use App\Http\Controllers\Controller;

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
        $this->userService->create();
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
}
