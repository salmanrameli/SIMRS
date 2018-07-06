<?php

namespace Modules\PerintahDokterDanPengobatan\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\PerintahDokterDanPengobatan\Entities\PerintahDokterDanPengobatan;
use Modules\PerjalananPenyakit\Entities\PerjalananPenyakit;
use Modules\RawatInap\Entities\RawatInap;

class PerintahDokterDanPengobatanController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('checkRole:3')->except(['showAllPerintahDokterDanPengobatanPasien', 'showDetailPerintahDokterDanPengobatanPasien']);

        $this->middleware('checkIfAuthorized');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllPerintahDokterDanPengobatanPasien($id_ranap)
    {
        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        $perintah_dokter = PerjalananPenyakit::with('perintah_dokter_dan_pengobatan')->where('id_ranap', '=', $id_ranap)->orderBy('created_at', 'desc')->get();

        return view('perintahdokterdanpengobatan::index')
            ->with('ranap', $ranap)
            ->with('perintahs', $perintah_dokter);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createPerintahDokterDanPengobatanPasien($id_ranap, $id_perintah)
    {
        $perintah = PerjalananPenyakit::with('rawat_inap')->findorFail($id_perintah);

        return view('perintahdokterdanpengobatan::create')
            ->with('perintah', $perintah)
            ->with('id_ranap', $id_ranap);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function savePerintahDokterDanPengobatanPasien(Request $request, $id_ranap)
    {
        $this->validate($request, [
            'catatan_perawat' => 'required',
        ]);

        $perintah_dokter = new PerintahDokterDanPengobatan();
        $perintah_dokter->id_perjalanan_penyakit = $request->id_perintah;
        $perintah_dokter->tanggal_keterangan = Carbon::now();
        $perintah_dokter->catatan_perawat = $request->catatan_perawat;
        $perintah_dokter->id_petugas = Auth::id();
        $perintah_dokter->save();

        Session::flash('message', 'Catatan berhasil disimpan');

        return redirect()->route('perintah_dokter_dan_pengobatan.index', $id_ranap);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function showDetailPerintahDokterDanPengobatanPasien($id_ranap, $id_perjalanan_penyakit)
    {
        if(!PerintahDokterDanPengobatan::where('id_perjalanan_penyakit', '=', $id_perjalanan_penyakit)->exists())
        {
            Session::flash('warning', 'Catatan perawat pada catatan perjalanan penyakit yang dipilih belum tersedia.');

            return redirect()->back();
        }

        $perintah = PerintahDokterDanPengobatan::with('perjalanan_penyakit')->where('id_perjalanan_penyakit', '=', $id_perjalanan_penyakit)->first();

        return view('perintahdokterdanpengobatan::show')
            ->with('perintah', $perintah)
            ->with('id_ranap', $id_ranap);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function editPerintahDokterDanPengobatanPasien($id_ranap, $id_perintah)
    {
        $perintah = PerintahDokterDanPengobatan::with('perjalanan_penyakit')->findorFail($id_perintah);

        if($perintah->catatan_perawat == null)
        {
            Session::flash('warning', 'Catatan perawat masih belum terisi');

            return redirect()->back();
        }

        return view('perintahdokterdanpengobatan::edit')
            ->with('perintah', $perintah)
            ->with('id_ranap', $id_ranap);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updatePerintahDokterDanPengobatanPasien(Request $request, $id_ranap, $id_perintah)
    {
        $this->validate($request, [
            'catatan_perawat' => 'required',
        ]);

        $perintah_dokter = PerintahDokterDanPengobatan::findorFail($id_perintah);
        $perintah_dokter->catatan_perawat = $request->catatan_perawat;
        $perintah_dokter->id_petugas = Auth::id();
        $perintah_dokter->save();

        Session::flash('message', 'Perubahan berhasil disimpan');

        return redirect()->route('perintah_dokter_dan_pengobatan.index', $id_ranap);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
