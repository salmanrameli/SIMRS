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
                return view('user::homepage.administrator')->with('nama', $user->nama);
            }
            else if(Auth::user()->jabatan == 'petugas')
            {
                return view('user::homepage.petugas')->with('nama', $user->nama);
            }
            else if(Auth::user()->jabatan == 'kasir')
            {
                return view('user::homepage.kasir')->with('nama', $user->nama);
            }
        }

        return view('welcome');
    }
}
