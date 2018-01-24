<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if($user->jabatan == 'administrator')
            {
                return view('administrator');
                //return view('administrator');
            }
            else if(Auth::user()->jabatan == 'petugas')
            {
                return view('petugas');

            }
            else if(Auth::user()->jabatan == 'kasir')
            {
                return view('kasir');

            }
        } else {
            // not logged-in
            return view('home.index.guest');
        }

        return view('home');
    }
}
