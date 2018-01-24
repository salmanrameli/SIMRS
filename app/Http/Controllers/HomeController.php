<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if($user->jabatan == 'administrator')
            {
                return view('administrator');
            }
            else if(Auth::user()->jabatan == 'petugas')
            {
                return view('petugas');
            }
            else if(Auth::user()->jabatan == 'kasir')
            {
                return view('kasir');
            }
        }

        return view('welcome');
    }
}
