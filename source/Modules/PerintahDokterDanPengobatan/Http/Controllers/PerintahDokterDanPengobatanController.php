<?php

namespace Modules\PerintahDokterDanPengobatan\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Pasien\Entities\Pasien;
use Modules\PerintahDokterDanPengobatan\Entities\PerintahDokterDanPengobatan;
use Modules\RawatInap\Entities\RawatInap;

class PerintahDokterDanPengobatanController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('checkRole:3')->except(['showAllPerintahDokterDanPengobatanPasien', 'showDetailPerintahDokterDanPengobatanPasien']);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllPerintahDokterDanPengobatanPasien($id)
    {
        $pasien = Pasien::where('id', $id)->first();

        $perintah_dokter = PerintahDokterDanPengobatan::where('id_pasien', $id)->orderBy('created_at', 'desc')->get();

        $tanggal_masuk = RawatInap::where('id_pasien', '=', $pasien->ktp)->value('tanggal_masuk');

        $diagnosa_awal = RawatInap::where('id_pasien', '=', $pasien->ktp)->value('diagnosa_awal');

        return view('perintahdokterdanpengobatan::index')
            ->with('pasien', $pasien)
            ->with('perintahs', $perintah_dokter)
            ->with('tanggal_masuk', $tanggal_masuk)
            ->with('diagnosa_awal', $diagnosa_awal);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createPerintahDokterDanPengobatanPasien($id, $perintah)
    {
        $perintah = PerintahDokterDanPengobatan::findorFail($perintah);

        $pasien = Pasien::findorFail($id);

        return view('perintahdokterdanpengobatan::create')
            ->with('perintah', $perintah)
            ->with('pasien', $pasien);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function savePerintahDokterDanPengobatanPasien(Request $request)
    {
        $this->validate($request, [
            'catatan_perawat' => 'required',
            'id_petugas' => 'required'
        ]);

        $perintah_dokter = PerintahDokterDanPengobatan::findorFail($request->id_perintah);
        $perintah_dokter->catatan_perawat = $request->catatan_perawat;
        $perintah_dokter->id_petugas = Auth::id();
        $perintah_dokter->created_at = new \DateTime();
        $perintah_dokter->updated_at = new \DateTime();
        $perintah_dokter->save();

        Session::flash('message', 'Catatan berhasil disimpan');

        return redirect()->route('perintah_dokter_dan_pengobatan.index', $request->id_pasien);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function showDetailPerintahDokterDanPengobatanPasien($id, $id_perjalanan_penyakit)
    {
        $pasien = Pasien::where('id', $id)->first();

        $perintah = PerintahDokterDanPengobatan::where('id_perjalanan_penyakit', '=', $id_perjalanan_penyakit)->first();

        $tanggal_masuk = RawatInap::where('id_pasien', '=', $pasien->ktp)->value('tanggal_masuk');

        $diagnosa_awal = RawatInap::where('id_pasien', '=', $pasien->ktp)->value('diagnosa_awal');

        return view('perintahdokterdanpengobatan::show')
            ->with('pasien', $pasien)
            ->with('tanggal_masuk', $tanggal_masuk)
            ->with('perintah', $perintah)
            ->with('diagnosa_awal', $diagnosa_awal);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function editPerintahDokterDanPengobatanPasien($id, $perintah)
    {
        $perintah = PerintahDokterDanPengobatan::findorFail($perintah);

        if($perintah->catatan_perawat == null)
        {
            Session::flash('warning', 'Catatan perawat masih belum terisi');

            return redirect()->back();
        }

        $pasien = Pasien::findorFail($id);

        return view('perintahdokterdanpengobatan::edit')
            ->with('perintah', $perintah)
            ->with('pasien', $pasien);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updatePerintahDokterDanPengobatanPasien(Request $request, $id_pasien, $perintah)
    {
        $this->validate($request, [
            'catatan_perawat' => 'required',
            'id_petugas' => 'required'
        ]);

        $perintah_dokter = PerintahDokterDanPengobatan::findorFail($request->id_perintah);
        $perintah_dokter->catatan_perawat = $request->catatan_perawat;
        $perintah_dokter->id_petugas = Auth::id();
        $perintah_dokter->save();

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
