<?php

namespace App\Http\Middleware;

use Closure;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $jabatan)
    {
        $jabatan_user = $request->user()->jabatan;

        if($jabatan_user != $jabatan)
        {
            $warning = "Anda tidak memiliki hak akses";

            return redirect()->back()->with('warning', $warning);
        }

        return $next($request);
    }
}
