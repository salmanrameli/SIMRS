<?php

namespace Modules\RawatInap\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Pasien\Entities\Pasien;
use Modules\RawatInap\Entities\PerintahDokterDanPengobatan;

class PerintahDokterDanPengobatanController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id)
    {
        $pasien = Pasien::where('id', $id)->first();

        $perintah_dokter = PerintahDokterDanPengobatan::where('id_pasien', $id)->get();

        return view('rawatinap::perintah_dokter_dan_pengobatan.index')
            ->with('pasien', $pasien)
            ->with('perintahs', $perintah_dokter);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id)
    {
        $pasien = Pasien::where('id', $id)->first();

        return view('rawatinap::perintah_dokter_dan_pengobatan.create')->with('pasien', $pasien);
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
            'terapi_dan_rencana_tindakan' => 'required',
            'catatan_perawat' => 'required',
            'id_petugas' => 'required'
        ]);

        $input = $request->all();

        PerintahDokterDanPengobatan::create($input);

        Session::flash('message', 'Catatan berhasil disimpan');

        return redirect()->route('perintah_dokter_dan_pengobatan.index', $request->id_pasien);
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
    public function edit($id, $perintah)
    {
        $perintah = PerintahDokterDanPengobatan::findorFail($perintah);

        $pasien = Pasien::findorFail($id);

        return view('rawatinap::perintah_dokter_dan_pengobatan.edit')
            ->with('perintah', $perintah)
            ->with('pasien', $pasien);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id_pasien, $perintah)
    {
        $perintah = PerintahDokterDanPengobatan::findorFail($perintah);

        $this->validate($request, [
            'id_pasien' => 'required',
            'tanggal_keterangan' => 'required',
            'terapi_dan_rencana_tindakan' => 'required',
            'catatan_perawat' => 'required',
            'id_petugas' => 'required'
        ]);

        $input = $request->all();

        $perintah->fill($input)->save();

        Session::flash('message', 'Perubahan berhasil disimpan');

        return redirect()->route('perintah_dokter_dan_pengobatan.index', $id_pasien);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
