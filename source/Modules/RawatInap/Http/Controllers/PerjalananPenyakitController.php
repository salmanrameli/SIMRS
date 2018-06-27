<?php

namespace Modules\RawatInap\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Pasien\Entities\Pasien;
use Modules\RawatInap\Entities\PerintahDokterDanPengobatan;
use Modules\RawatInap\Entities\PerjalananPenyakit;
use Modules\RawatInap\Entities\RawatInap;

class PerjalananPenyakitController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('checkRole:4')->except(['showAllPerjalananPenyakitPasien', 'showDetailPerjalananPenyakitPasien']);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllPerjalananPenyakitPasien($id)
    {
        $pasien = Pasien::where('id', $id)->first();

        $perjalanan = PerjalananPenyakit::where('id_pasien', $id)->orderBy('created_at', 'desc')->get();

        $tanggal_masuk = RawatInap::where('id_pasien', '=', $pasien->ktp)->value('tanggal_masuk');

        $diagnosa_awal = RawatInap::where('id_pasien', '=', $pasien->ktp)->value('diagnosa_awal');

        return view('rawatinap::perjalanan_penyakit.index')
            ->with('pasien', $pasien)
            ->with('perjalanans', $perjalanan)
            ->with('diagnosa_awal', $diagnosa_awal)
            ->with('tanggal_masuk', $tanggal_masuk);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createNewPerjalananPenyakitPasien($id)
    {
        $pasien = Pasien::where('id', $id)->first();

        return view('rawatinap::perjalanan_penyakit.create')->with('pasien', $pasien);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function saveNewPerjalananPenyakitPasien(Request $request)
    {
        $this->validate($request, [
            'id_pasien' => 'required',
            'tanggal_keterangan' => 'required',
            'subjektif' => 'required',
            'objektif' => 'required',
            'assessment' => 'required',
            'planning_perintah_dokter_dan_pengobatan' => 'required',
            'id_petugas' => 'required'
        ]);

        $request->request->add(['id_perintah_dokter_dan_pengobatan', '0']);
        $input = $request->all();

        PerjalananPenyakit::create($input);

        $id_perjalanan_penyakit = PerjalananPenyakit::where('subjektif', '=', $request->subjektif)->value('id');

        $perintah_dokter = new PerintahDokterDanPengobatan();
        $perintah_dokter->id_pasien = $request->id_pasien;
        $perintah_dokter->tanggal_keterangan = $request->tanggal_keterangan;
        $perintah_dokter->terapi_dan_rencana_tindakan = $request->planning_perintah_dokter_dan_pengobatan;
        $perintah_dokter->catatan_perawat = null;
        $perintah_dokter->id_petugas = null;
        $perintah_dokter->id_perjalanan_penyakit = $id_perjalanan_penyakit;
        $perintah_dokter->save();

        $id_perintah_dokter = PerintahDokterDanPengobatan::where('terapi_dan_rencana_tindakan', '=', $request->planning_perintah_dokter_dan_pengobatan)->value('id');

        PerjalananPenyakit::where('subjektif', '=', $request->subjektif)->update(['id_perintah_dokter_dan_pengobatan' => $id_perintah_dokter]);

        Session::flash('message', 'Catatan berhasil disimpan');

        return redirect()->route('perjalanan_penyakit.index', $request->id_pasien);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function showDetailPerjalananPenyakitPasien($id, $id_perjalanan)
    {
        $pasien = Pasien::where('id', $id)->first();

        $perjalanan = PerjalananPenyakit::where('id', '=', $id_perjalanan)->first();

        $tanggal_masuk = RawatInap::where('id_pasien', '=', $pasien->ktp)->value('tanggal_masuk');

        $diagnosa_awal = RawatInap::where('id_pasien', '=', $pasien->ktp)->value('diagnosa_awal');

        return view('rawatinap::perjalanan_penyakit.show')
            ->with('pasien', $pasien)
            ->with('perjalanan', $perjalanan)
            ->with('tanggal_masuk', $tanggal_masuk)
            ->with('diagnosa_awal', $diagnosa_awal);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function editPerjalananPenyakitPasien($id, $perjalanan)
    {
        $perjalanan = PerjalananPenyakit::findorFail($perjalanan);

        $pasien = Pasien::findorFail($id)->value('nama');

        return view('rawatinap::perjalanan_penyakit.edit')
            ->with('perjalanan', $perjalanan)
            ->with('pasien', $pasien);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updatePerjalananPenyakitPasien(Request $request, $id_pasien, $perjalanan)
    {
        $perjalanan = PerjalananPenyakit::findorFail($perjalanan);

        $this->validate($request, [
            'id_pasien' => 'required',
            'tanggal_keterangan' => 'required',
            'subjektif' => 'required',
            'objektif' => 'required',
            'assessment' => 'required',
            'planning_perintah_dokter_dan_pengobatan' => 'required',
            'id_petugas' => 'required'
        ]);

        $input = $request->all();

        $perjalanan->fill($input)->save();

        PerintahDokterDanPengobatan::where('id_perjalanan_penyakit', '=', $perjalanan->id)->update(['terapi_dan_rencana_tindakan' => $request->planning_perintah_dokter_dan_pengobatan]);

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
