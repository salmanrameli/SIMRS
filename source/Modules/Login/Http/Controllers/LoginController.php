<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Bangunan\Entities\Kamar;
use Modules\Bangunan\Entities\Lantai;
use Modules\RawatInap\Entities\RawatInap;

class LoginController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $jabatan = Auth::user()->jabatan_id;

            switch ($jabatan) {
                case '1':
                    return view('login::homepage.administrator')->with('nama', Auth::user()->nama);
                    break;
                case '2':
                    return view('login::homepage.administrasi')->with('nama', Auth::user()->nama);
                    break;
                case '3':
                    return view('login::homepage.kasir')->with('nama', Auth::user()->nama);
                    break;
                default:
                    return view('welcome');
                    break;
            }
        }

        return view('welcome');
    }
}