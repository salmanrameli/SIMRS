<?php

namespace Modules\HariPerawatan\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\HariPerawatan\Entities\HariPerawatan;
use Modules\KonsumsiObat\Entities\KonsumsiObat;
use Modules\KonsumsiObat\Entities\KonsumsiObatLuar;

class HariPerawatanController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('hariperawatan::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('hariperawatan::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function storeRincianHariPerawatan(Request $request)
    {
        $this->validate($request, [
            'id_ranap' => 'required',
            'tanggal' => 'required',
            'hari_perawatan' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'berat_badan' => 'required'
        ]);

        $hari_perawatan = new HariPerawatan();
        $hari_perawatan->id_ranap = $request->get('id_ranap');
        $hari_perawatan->tanggal = $request->get('tanggal');
        $hari_perawatan->hari_perawatan = $request->get('hari_perawatan');
        $hari_perawatan->tinggi_badan = $request->get('tinggi_badan');
        $hari_perawatan->berat_badan = $request->get('berat_badan');
        $hari_perawatan->id_petugas = Auth::id();
        $hari_perawatan->save();

        $obat_luar = KonsumsiObatLuar::where('id_ranap', '=', $request->get('id_ranap'))->get();
        foreach ($obat_luar as $obat)
        {
            $konsumsi_obat = new KonsumsiObat();
            $konsumsi_obat->id_ranap = $request->get('id_ranap');
            $konsumsi_obat->id_hari_perawatan = $hari_perawatan->id;
            $konsumsi_obat->nama_obat = $obat->nama_obat;
            $konsumsi_obat->obat_luar = true;
            $konsumsi_obat->id_petugas = Auth::id();
            $konsumsi_obat->keterangan = KonsumsiObat::where('nama_obat', '=', $obat->nama_obat)->value('keterangan');
            $konsumsi_obat->save();
        }

        Session::flash('message', 'Rincian hari perawatan berhasil disimpan.');

        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('hariperawatan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('hariperawatan::edit');
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
