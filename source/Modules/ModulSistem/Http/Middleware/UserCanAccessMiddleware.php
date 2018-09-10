<?php

namespace Modules\ModulSistem\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\ModulSistem\Entities\HakAksesModulSistem;

class userCanAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $id_modul)
    {
        if(HakAksesModulSistem::where('id_jabatan', '=', Auth::user()->jabatan_id)->where('id_modul', '=', $id_modul)->exists())
        {
            return $next($request);
        }

        Session::flash('warning', 'Anda tidak memiliki hak akses untuk modul yang dituju.');

        return redirect()->back();
    }
}
