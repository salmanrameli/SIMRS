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

            if($user->jabatan_id == '1')
            {
                return view('user::homepage.administrator')->with('nama', Auth::user()->nama);
            }
            else if($user->jabatan_id == '2')
            {
                return redirect()->route('ranap.index');
            }
            else if($user->jabatan_id == '3')
            {
                return view('user::homepage.kasir')->with('nama', Auth::user()->nama);
            }
        }

        return view('welcome');
    }
}
