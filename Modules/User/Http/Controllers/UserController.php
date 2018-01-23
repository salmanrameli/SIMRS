<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\User\Entities\User;

class UserController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $user = User::all();

        return view('user::index')->with('users', $user);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'password' => 'required',
            'jabatan' => 'required'
        ]);

        $user = new User();
        $user->id = $request->id;
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->telepon = $request->telepon;
        $user->password = bcrypt($request->password);
        $user->jabatan = $request->jabatan;

        $user->save();

        Session::flash('message', 'Akun berhasil dibuat');

        return redirect()->route('user.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
