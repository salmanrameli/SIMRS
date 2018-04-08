<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $jabatan = Auth::user()->jabatan_id;

            switch ($jabatan) {
                case '1':
                    return view('login::homepage.administrator');
                    break;
                case '2':
                    return view('login::homepage.administrasi');
                    break;
                case '3':
                    return view('login::homepage.perawat');
                    break;
                default:
                    return view('welcome');
                    break;
            }
        }

        return view('welcome');
    }
}