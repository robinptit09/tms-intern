<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Sentinel::check())
        {
            $user = Sentinel::getUser();
            if ($user->hasAccess('admin')) {
                return $next($request);
            } else {
                Sentinel::logout();
                session()->flash('message', 'Login failed!');
                return redirect()->back();
            }
        }
        else
        {
            return redirect(route('admin_login'));
        }

    }
}
