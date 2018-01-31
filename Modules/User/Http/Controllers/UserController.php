<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\User\Entities\User;

class UserController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('user::administrator');
    }

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
            'id' => 'required|unique:users',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
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
    public function show($id)
    {
        $staff = User::findorFail($id);

        return view('user::show')->with('user', $staff);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);

        return view('user::edit')->with('user', $user);
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

    public function cari(Request $request)
    {
        $query = $request->get('query');

        $results = DB::table('users')->select('*')->where('id', 'like', '%'.$query.'%')->
            orWhere('nama', 'like', '%'.$query.'%')->
            orWhere('alamat', 'like', '%'.$query.'%')->
            orWhere('telepon', 'like', '%'.$query.'%')->get();

        return view('user::hasil_cari')->with('results', $results)->with('query', $query);
    }
}
