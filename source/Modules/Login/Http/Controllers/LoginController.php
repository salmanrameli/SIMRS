<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\ModulSistem\Entities\HakAksesModulSistem;
use Modules\ModulSistem\Entities\ModulSistem;

class LoginController extends Controller
{
    public function home()
    {
        if (Auth::check()) {

            $modul = ModulSistem::whereIn('id', HakAksesModulSistem::where('id_jabatan', '=', Auth::user()->jabatan_id)->pluck('id_modul'))->orderBy('modul')->get();

            return view('login::index')
                ->with('moduls', $modul);

        }

        return view('welcome');
    }
}