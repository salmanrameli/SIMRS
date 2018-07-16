<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\User\Entities\Jabatan;

class JabatanController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('checkRole:1');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('user::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createNewJabatan()
    {
        return view('user::jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function saveNewJabatan(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:jabatan'
        ]);

        $jabatan = new Jabatan();
        $jabatan->nama = $request->get('nama');
        $jabatan->save();

        Session::flash('message', 'Jabatan berhasil disimpan.');

        return redirect()->route('user.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('user::jabatan.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function editJabatan($id)
    {
        $jabatan = Jabatan::findorFail($id);

        return view('user::jabatan.edit')->with('jabatan', $jabatan);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateJabatan(Request $request, $id)
    {
        $jabatan = Jabatan::findorFail($id);

        $this->validate($request, [
            'nama' => 'required|unique:jabatan'
        ]);

        $input = $request->all();

        $jabatan->fill($input)->save();

        Session::flash('message', 'Perubahan rincian jabatan berhasil disimpan');

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::findorFail($id);

        $jabatan->delete();

        Session::flash('message', 'Jabatan berhasil dihapus');

        return redirect()->route('user.index');
    }
}
