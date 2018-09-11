<?php

namespace Modules\ModulSistem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Jabatan\Entities\Jabatan;
use Modules\ModulSistem\Entities\HakAksesModulSistem;
use Modules\ModulSistem\Entities\ModulSistem;

class ModulSistemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('checkRole:1');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllModul()
    {
        $modul = ModulSistem::orderBy('modul')->get();

        $jabatan = Jabatan::all();

        return view('modulsistem::index')
            ->with('moduls', $modul)
            ->with('jabatans', $jabatan);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('modulsistem::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function tambahHakAksesModul(Request $request)
    {
        $jabatans = $request->get('id_jabatan');
        $id_modul = $request->get('id_modul');

        foreach ($jabatans as $jabatan)
        {
            if(!HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', $jabatan)->exists())
            {
                $hak_akses = new HakAksesModulSistem();
                $hak_akses->id_modul = $id_modul;
                $hak_akses->id_jabatan = $jabatan;
                $hak_akses->save();

                Session::flash('message', 'Hak akses berhasil ditambahkan pada modul.');
            }
        }

        return redirect()->route('modul.index');
    }

    public function aturPermissionModul(Request $request)
    {
        $id_modul = $request->get('id_modul');
        $id_jabatan = $request->get('id_jabatan');

        if($request->has('create'))
            HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', $id_jabatan)->update(['create' => 1]);
        else
            HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', $id_jabatan)->update(['create' => 0]);


        if($request->has('read'))
            HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', $id_jabatan)->update(['read' => 1]);
        else
            HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', $id_jabatan)->update(['read' => 0]);

        if($request->has('update'))
            HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', $id_jabatan)->update(['update' => 1]);
        else
            HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', $id_jabatan)->update(['update' => 0]);

        if($request->has('delete'))
            HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', $id_jabatan)->update(['delete' => 1]);
        else
            HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', $id_jabatan)->update(['delete' => 0]);

        Session::flash('message', 'Pengaturan permission berhasil disimpan.');

        return redirect()->route('modul.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('modulsistem::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function ubahHakAksesModul($id_modul)
    {
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateHakAksesModul(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function hapusHakAksesModul($id_modul, $id_jabatan)
    {
        HakAksesModulSistem::where('id_modul', '=', $id_modul)->where('id_jabatan', '=', $id_jabatan)->delete();

        Session::flash('message', 'Hak akses berhasil dihapus dari modul.');

        return redirect()->route('modul.index');
    }
}
