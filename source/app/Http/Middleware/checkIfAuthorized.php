<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\RawatInap\Entities\RawatInap;

class checkIfAuthorized
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

        if($request->route()->parameter('id') != null)
        {
            $id_ranap = $request->route()->parameter('id');
        }
        else
        {
            $id_ranap = $request->get('id_ranap');
        }

        $id_dokter_pj = RawatInap::where('id', '=', $id_ranap)->value('id_dokter_pj');

        if(Auth::user()->jabatan_id == 4 && $id_dokter_pj != Auth::user()->id)
        {
            Session::flash('warning', 'Anda tidak memiliki hak akses untuk mengakses rincian rawat inap pasien.');

            return redirect()->back();
        }

        return $next($request);
    }
}
