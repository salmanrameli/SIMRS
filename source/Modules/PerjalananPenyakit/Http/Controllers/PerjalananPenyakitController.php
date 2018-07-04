<?php

namespace Modules\PerjalananPenyakit\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PerjalananPenyakit\Entities\PerjalananPenyakit;
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
        $ranap = RawatInap::with('pasien')->where('id', '=', $id)->first();

        $perjalanan = PerjalananPenyakit::where('id_ranap', $id)->orderBy('created_at', 'desc')->get();

        return view('perjalananpenyakit::index')
            ->with('ranap', $ranap)
            ->with('perjalanans', $perjalanan);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createNewPerjalananPenyakitPasien($id)
    {
        $ranap = RawatInap::where('id', $id)->first();

        return view('perjalananpenyakit::create')->with('ranap', $ranap);
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
            'id_ranap' => 'required',
            'tanggal_keterangan' => 'required',
            'subjektif' => 'required',
            'objektif' => 'required',
            'assessment' => 'required',
            'planning_perintah_dokter_dan_pengobatan' => 'required',
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
    public function showDetailPerjalananPenyakitPasien($id)
    {
        $perjalanan = PerjalananPenyakit::where('id', '=', $id)->first();

        $ranap = RawatInap::with('pasien')->where('id', '=', $perjalanan->id_ranap)->first();

        return view('perjalananpenyakit::show')
            ->with('perjalanan', $perjalanan)
            ->with('ranap', $ranap);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function editPerjalananPenyakitPasien($perjalanan)
    {
        $perjalanan = PerjalananPenyakit::findorFail($perjalanan);

        $ranap = RawatInap::with('pasien')->where('id', '=', $perjalanan->id_ranap)->first();

        return view('perjalananpenyakit::edit')
            ->with('perjalanan', $perjalanan)
            ->with('ranap', $ranap);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updatePerjalananPenyakitPasien(Request $request, $id_ranap, $perjalanan)
    {
        $perjalanan = PerjalananPenyakit::findorFail($perjalanan);

        $this->validate($request, [
            'id_ranap' => 'required',
            'tanggal_keterangan' => 'required',
            'subjektif' => 'required',
            'objektif' => 'required',
            'assessment' => 'required',
            'planning_perintah_dokter_dan_pengobatan' => 'required',
            'id_petugas' => 'required'
        ]);

        $input = $request->all();

        $perjalanan->fill($input)->save();

        Session::flash('message', 'Perubahan berhasil disimpan');

        return redirect()->route('perjalanan_penyakit.index', $id_ranap);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
