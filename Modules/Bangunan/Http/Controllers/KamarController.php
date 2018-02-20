<?php

namespace Modules\Bangunan\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Bangunan\Entities\Kamar;
use Modules\Bangunan\Entities\Lantai;

class KamarController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('bangunan::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $lantai = Lantai::pluck('nomor_lantai');

        return view('bangunan::kamar.create')->with('lantais', $lantai);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor_lantai' => 'required',
            'nama_kamar' => 'required',
            'jumlah_maks_pasien' => 'required'
        ]);

        $kamar = new Kamar();
        $kamar->nomor_lantai = $request->nomor_lantai;
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->jumlah_maks_pasien = $request->jumlah_maks_pasien;
        $kamar->save();

        Session::flash('message', 'Kamar Berhasil Disimpan');

        return redirect()->route('bangunan.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $kamar = Kamar::findorFail($id);

        return view('bangunan::kamar.show')
            ->with('kamar', $kamar);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $kamar = Kamar::findorFail($id);

        return view('bangunan::kamar.edit')
            ->with('kamar', $kamar);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $kamar = Kamar::findorFail($id);

        $this->validate($request, [
            'nama_kamar' => 'required',
            'jumlah_maks_pasien' => 'required'
        ]);

        $input = $request->all();

        $kamar->fill($input)->save();

        Session::flash('message', 'Detail kamar berhasil diubah');

        return redirect()->route('kamar.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
