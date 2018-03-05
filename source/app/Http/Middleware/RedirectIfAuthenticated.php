<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check())
        {
            if($request->jabatan == 'administrator')
            {
                return view('user::jabatan.administrator');
            }
            else if($request->jabatan == 'petugas')
            {
                return view('user::jabatan.petugas');

            }
            else if($request->jabatan == 'kasir')
            {
                return view('user::jabatan.kasir');

            }

            return view('welcome');
        }

        return $next($request);
    }
}
