<?php

namespace Modules\UserSetting\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Modules\User\Entities\Jabatan;
use Modules\User\Entities\User;

class UserSettingController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAkun()
    {
        $user = User::where('id', Auth::id())->first();

        return view('usersetting::index')->with('user', $user);
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
    public function editAkun($id)
    {
        $user_id = Auth::id();

        if($id == $user_id)
        {
            $user = User::findorFail($id);
            $jabatan = Jabatan::all();

            return view('usersetting::edit')
                ->with('user', $user)
                ->with('jabatans', $jabatan);
        }

        Session::flash('warning', 'Anda tidak memiliki hak akses.');

        return redirect()->back();
    }

    public function editPassword($id)
    {
        $user_id = Auth::id();

        if($id == $user_id)
        {
            return view('usersetting::edit_password');
        }

        Session::flash('warning', 'Anda tidak memiliki hak akses.');

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateAkun($id, Request $request)
    {
        $user = User::findorFail($id);

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
        ]);

        $user->id_user = $request->id_user;
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->telepon = $request->telepon;
        $user->save();

        Session::flash('message', 'Akun berhasil diubah.');

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

            Session::flash('message', "Password berhasil diubah.");

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
