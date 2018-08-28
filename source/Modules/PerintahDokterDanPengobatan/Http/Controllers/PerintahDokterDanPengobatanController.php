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
use Modules\PerintahDokterDanPengobatan\Entities\RevisiPerintahDokterDanPengobatan;
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
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function savePerintahDokterDanPengobatanPasien(Request $request)
    {
        $this->validate($request, [
            'catatan_perawat' => 'required',
        ]);

        $perintah_dokter = new PerintahDokterDanPengobatan();
        $perintah_dokter->id_perjalanan_penyakit = $request->get('id_perintah');
        $perintah_dokter->tanggal_keterangan = Carbon::now();
        $perintah_dokter->catatan_perawat = $request->get('catatan_perawat');
        $perintah_dokter->id_petugas = Auth::id();
        $perintah_dokter->save();

        Session::flash('message', 'Catatan berhasil disimpan.');

        return redirect()->route('perintah_dokter_dan_pengobatan.index', $request->get('id_ranap'));
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

        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        return view('perintahdokterdanpengobatan::show')
            ->with('perintah', $perintah)
            ->with('ranap', $ranap);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updatePerintahDokterDanPengobatanPasien(Request $request)
    {
        $this->validate($request, [
            'catatan_perawat' => 'required',
        ]);

        $perintah_dokter = PerintahDokterDanPengobatan::findorFail($request->get('id'));

        $revisi_perintah_dokter = new RevisiPerintahDokterDanPengobatan();
        $revisi_perintah_dokter->id_perintah_dokter_dan_pengobatan = $perintah_dokter->id;
        $revisi_perintah_dokter->catatan_perawat = $perintah_dokter->catatan_perawat;
        $revisi_perintah_dokter->save();

        $perintah_dokter->catatan_perawat = $request->get('catatan_perawat');
        $perintah_dokter->save();

        Session::flash('message', 'Perubahan berhasil disimpan.');

        return redirect()->route('perintah_dokter_dan_pengobatan.index', $request->get('id_ranap'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function lihatRevisiPerintahDokter($id_ranap, $id_perintah_dokter)
    {
        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        $revisi = RevisiPerintahDokterDanPengobatan::where('id_perintah_dokter_dan_pengobatan', '=', $id_perintah_dokter)->orderBy('created_at', 'desc')->get();

        return view('perintahdokterdanpengobatan::revisi')
            ->with('ranap', $ranap)
            ->with('revisis', $revisi);
    }
}
