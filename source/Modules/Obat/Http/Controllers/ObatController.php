<?php

namespace Modules\Obat\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Obat\Entities\Obat;

class ObatController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('checkRole:1');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllObat()
    {
        $obat = Obat::all();

        return view('obat::index')->with('obats', $obat);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function registerNewObat()
    {
        return view('obat::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function saveNewObat(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'satuan' => 'required'
        ]);

        $obat = new Obat();
        $obat->nama = $request->get('nama');
        $obat->harga = $request->get('harga');
        $obat->tipe_obat = $request->get('jenis');
        $obat->satuan = $request->get('satuan');
        $obat->save();

        Session::flash('message', 'Obat berhasil disimpan.');

        return redirect()->route('obat.index');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateObat(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'satuan' => 'required'
        ]);

        $obat = Obat::findorFail($request->get('id'));
        $obat->nama = $request->get('nama');
        $obat->harga = $request->get('harga');
        $obat->tipe_obat = $request->get('jenis');
        $obat->satuan = $request->get('satuan');
        $obat->save();

        Session::flash('message', 'Perubahan rincian obat berhasil disimpan.');

        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
