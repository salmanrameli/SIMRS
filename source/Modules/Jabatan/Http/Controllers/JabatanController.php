<?php

namespace Modules\Jabatan\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Jabatan\Entities\Jabatan;
use Modules\ModulSistem\Entities\ModulSistem;

class JabatanController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');

        $id_modul = ModulSistem::where('modul', '=', config('jabatan.name'))->value('id');

        $this->middleware('userCanAccess:'.$id_modul, ['only' => 'showAllJabatan']);

        $this->middleware('userCanCreate:'.$id_modul, ['only' => 'saveNewJabatan']);

        $this->middleware('userCanUpdate:'.$id_modul, ['only' => 'updateJabatan']);

        $this->middleware('userCanDelete:'.$id_modul, ['only' => 'deleteJabatan']);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllJabatan()
    {
        $jabatan = Jabatan::all();

        return view('jabatan::index')
            ->with('jabatans', $jabatan)
            ->with('jabatan', $jabatan->first());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createNewJabatan()
    {
        return view('jabatan::create');
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

        return redirect()->route('jabatan.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('jabatan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('jabatan::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateJabatan(Request $request)
    {
        $this->validate($request, [
            'nama_jabatan' => 'required|unique:jabatan'
        ]);

        $jabatan = Jabatan::findorFail($request->get('id'));
        $jabatan->nama = $request->get('nama_jabatan');
        $jabatan->save();

        Session::flash('message', 'Perubahan rincian jabatan berhasil disimpan.');

        return redirect()->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function deleteJabatan($id)
    {
        $jabatan = Jabatan::findorFail($id);

        $jabatan->delete();

        Session::flash('message', 'Jabatan berhasil dihapus.');

        return redirect()->route('user.index');
    }
}
