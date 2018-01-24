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
        if (Auth::guard($guard)->check()) {
            if($request->jabatan == 'administrator')
            {
                return view('administrator');
            }
            else if($request->jabatan == 'petugas')
            {
                return view('petugas');

            }
            else if($request->jabatan == 'kasir')
            {
                return view('kasir');

            }

            //return redirect('/home');
        }

        return $next($request);
    }
}
