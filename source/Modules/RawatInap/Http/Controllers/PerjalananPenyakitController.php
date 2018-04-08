<?php

namespace Modules\RawatInap\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Pasien\Entities\Pasien;
use Modules\RawatInap\Entities\PerjalananPenyakit;

class PerjalananPenyakitController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id)
    {
        $pasien = Pasien::where('id', $id)->first();

        $perjalanan = PerjalananPenyakit::where('id_pasien', $id)->get();

        return view('rawatinap::perjalanan_penyakit.index')
            ->with('pasien', $pasien)
            ->with('perjalanans', $perjalanan);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id)
    {
        $pasien = Pasien::where('id', $id)->first();

        return view('rawatinap::perjalanan_penyakit.create')->with('pasien', $pasien);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_pasien' => 'required',
            'tanggal_keterangan' => 'required',
            'perjalanan_penyakit' => 'required',
            'perintah_dokter_dan_pengobatan' => 'required',
            'id_petugas' => 'required'
        ]);

        $input = $request->all();

        PerjalananPenyakit::create($input);

        Session::flash('message', 'Catatan berhasil disimpan');

        return redirect()->route('perjalanan_penyakit.index', $request->id_pasien);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('rawatinap::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id, $perjalanan)
    {
        $perjalanan = PerjalananPenyakit::findorFail($perjalanan);

        return view('rawatinap::perjalanan_penyakit.edit')->with('perjalanan', $perjalanan);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id_pasien, $perjalanan)
    {
        $perjalanan = PerjalananPenyakit::findorFail($perjalanan);

        $this->validate($request, [
            'id_pasien' => 'required',
            'tanggal_keterangan' => 'required',
            'perjalanan_penyakit' => 'required',
            'perintah_dokter_dan_pengobatan' => 'required',
            'id_petugas' => 'required'
        ]);

        $input = $request->all();

        $perjalanan->fill($input)->save();

        Session::flash('message', 'Perubahan berhasil disimpan');

        return redirect()->route('perjalanan_penyakit.index', $id_pasien);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
