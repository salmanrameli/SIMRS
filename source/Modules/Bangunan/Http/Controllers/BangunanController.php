<?php

namespace Modules\Bangunan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Bangunan\Entities\Kamar;
use Modules\Bangunan\Entities\Lantai;
use Modules\RawatInap\Entities\RawatInap;

class BangunanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('checkRole:1');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $pasien_ranap = RawatInap::with('pasien')->select('*')->whereNull('tanggal_keluar')->orderBy('tanggal_masuk', 'desc')->get();

        $lantai = Lantai::select('nomor_lantai', 'id')->orderBy('lantai.id', 'desc')->get();

        $kamar = collect(Kamar::select('id', 'nomor_lantai', 'nama_kamar', 'jumlah_maks_pasien')->get());

        $terisi_sekarang = DB::table('rawat_inap')->select('nama_kamar', DB::raw('count(id_pasien) as pasien_inap'))->whereNull('tanggal_keluar')->groupBy('nama_kamar')->get();

        return view('bangunan::index')
            ->with('pasiens', $pasien_ranap)
            ->with('terisis', $terisi_sekarang)
            ->with('lantais', $lantai)
            ->with('kamars', $kamar);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('bangunan::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return redirect()->route('bangunan.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('bangunan::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
