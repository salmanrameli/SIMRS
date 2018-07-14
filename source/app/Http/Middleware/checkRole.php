<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$jabatans)
    {
        if(Auth::check())
        {
            $jabatan_user = $request->user()->jabatan_id;

            foreach ($jabatans as $jabatan)
            {
                if($jabatan_user == $jabatan)
                {
                    return $next($request);
                }
            }

            $warning = "Anda tidak memiliki hak akses";

            return redirect()->back()->with('warning', $warning);
        }

        Session::flash('warning', 'Silahkan login kembali karena waktu session anda sudah habis');

        return redirect('/login');
    }
}
