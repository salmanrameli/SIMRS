<?php

namespace Modules\PerjalananPenyakit\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\PerjalananPenyakit\Entities\PerjalananPenyakit;
use Modules\RawatInap\Entities\RawatInap;

class PerjalananPenyakitController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('checkRole:4')->except(['showAllPerjalananPenyakitPasien', 'showDetailPerjalananPenyakitPasien']);

        $this->middleware('checkIfAuthorized');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllPerjalananPenyakitPasien($id_ranap)
    {
        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        $perjalanan = PerjalananPenyakit::where('id_ranap', '=', $id_ranap)->orderBy('created_at', 'desc')->get();

        return view('perjalananpenyakit::index')
            ->with('ranap', $ranap)
            ->with('perjalanans', $perjalanan);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function saveNewPerjalananPenyakitPasien(Request $request)
    {
        $this->validate($request, [
            'id_ranap' => 'required',
            'tanggal_keterangan' => 'required',
            'subjektif' => 'required',
            'objektif' => 'required',
            'assessment' => 'required',
            'planning_perintah_dokter_dan_pengobatan' => 'required',
        ]);

        $perjalanan_penyakit = new PerjalananPenyakit();
        $perjalanan_penyakit->id_ranap = $request->get('id_ranap');
        $perjalanan_penyakit->tanggal_keterangan = $request->get('tanggal_keterangan');
        $perjalanan_penyakit->subjektif = $request->get('subjektif');
        $perjalanan_penyakit->objektif = $request->get('objektif');
        $perjalanan_penyakit->assessment = $request->get('assessment');
        $perjalanan_penyakit->planning_perintah_dokter_dan_pengobatan = $request->get('planning_perintah_dokter_dan_pengobatan');
        $perjalanan_penyakit->id_petugas = Auth::id();
        $perjalanan_penyakit->save();

        Session::flash('message', 'Catatan perjalanan penyakit pasien berhasil disimpan.');

        return redirect()->route('perjalanan_penyakit.index', $request->get('id_ranap'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function showDetailPerjalananPenyakitPasien($id_ranap, $id_perjalanan_penyakit)
    {
        $perjalanan = PerjalananPenyakit::where('id', '=', $id_perjalanan_penyakit)->first();

        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        return view('perjalananpenyakit::show')
            ->with('perjalanan', $perjalanan)
            ->with('ranap', $ranap);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updatePerjalananPenyakitPasien(Request $request)
    {
        $this->validate($request, [
            'subjektif_edit' => 'required',
            'objektif_edit' => 'required',
            'assessment_edit' => 'required',
            'planning_perintah_dokter_dan_pengobatan_edit' => 'required',
        ]);

        $perjalanan = PerjalananPenyakit::findorFail($request->get('perjalanan'));

        $perjalanan->subjektif = $request->get('subjektif_edit');
        $perjalanan->objektif = $request->get('objektif_edit');
        $perjalanan->assessment = $request->get('assessment_edit');
        $perjalanan->planning_perintah_dokter_dan_pengobatan = $request->get('planning_perintah_dokter_dan_pengobatan_edit');
        $perjalanan->save();

        Session::flash('message', 'Perubahan berhasil disimpan.');

        return redirect()->route('perjalanan_penyakit.index', $request->get('id_ranap'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
