<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Modules\User\Entities\User;

class SettingController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->first();

        return view('user::setting.index')->with('user', $user);
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
    public function edit($id)
    {
        $user_id = Auth::id();

        if($id == $user_id)
        {
            $user = User::findorFail($id);

            return view('user::setting.edit')->with('user', $user);
        }

        Session::flash('warning', 'Anda tidak memiliki hak akses');

        return redirect()->back();
    }

    public function editPassword($id)
    {
        $user_id = Auth::id();

        if($id == $user_id)
        {
            return view('user::setting.edit_password');
        }

        Session::flash('warning', 'Anda tidak memiliki hak akses');

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        $user = User::findorFail($id);

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'jabatan' => 'required'
        ]);

        $input = $request->all();

        $user->fill($input)->save();

        Session::flash('message', 'Akun berhasil diupdate');

        return redirect()->route('setting.index');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::find(Auth::id());

        $hashedPassword = $user->password;

        if (Hash::check($request->old, $hashedPassword))
        {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            Session::flash('message', "Password berhasil diubah");

            return redirect()->route('setting.index');
        }

        Session::flash('error', 'Terjadi kesalahan');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
