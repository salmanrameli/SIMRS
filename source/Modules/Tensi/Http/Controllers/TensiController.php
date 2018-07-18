<?php

namespace Modules\Tensi\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\KonsumsiObat\Entities\HariPerawatan;
use Modules\RawatInap\Entities\RawatInap;
use Modules\Tensi\Entities\TensiMalam;
use Modules\Tensi\Entities\TensiPagi;
use Modules\Tensi\Entities\TensiSiang;
use Modules\Tensi\Entities\TensiSore;

class TensiController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllTensi($id_ranap)
    {
        $ranap = RawatInap::where('id', '=', $id_ranap)->first();

        $hari_perawatan = HariPerawatan::with('konsumsi_obat')->where('id_ranap', '=', $id_ranap)->orderBy('tanggal', 'desc')->get();

        return view('tensi::index')
            ->with('ranap', $ranap)
            ->with('haris', $hari_perawatan);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('tensi::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function storeTensiPasien(Request $request)
    {
        $this->validate($request, [
            'id_hari_perawatan' => 'required',
            'tensi_atas' => 'required',
            'tensi_bawah' => 'required',
            'waktu' => 'required'
        ]);

        $waktu = $request->get('waktu');

        if($waktu == 'pagi')
        {
            $pagi = new TensiPagi();
            $pagi->id_hari_perawatan = $request->get('id_hari_perawatan');
            $pagi->tensi_atas = $request->get('tensi_atas');
            $pagi->tensi_bawah = $request->get('tensi_bawah');
            $pagi->id_petugas = Auth::id();
            $pagi->save();
        }
        if($waktu == 'siang')
        {
            $siang = new TensiSiang();
            $siang->id_hari_perawatan = $request->get('id_hari_perawatan');
            $siang->tensi_atas = $request->get('tensi_atas');
            $siang->tensi_bawah = $request->get('tensi_bawah');
            $siang->id_petugas = Auth::id();
            $siang->save();
        }
        if($waktu == 'sore')
        {
            $sore = new TensiSore();
            $sore->id_hari_perawatan = $request->get('id_hari_perawatan');
            $sore->tensi_atas = $request->get('tensi_atas');
            $sore->tensi_bawah = $request->get('tensi_bawah');
            $sore->id_petugas = Auth::id();
            $sore->save();
        }
        if($waktu == 'malam')
        {
            $malam = new TensiMalam();
            $malam->id_hari_perawatan = $request->get('id_hari_perawatan');
            $malam->tensi_atas = $request->get('tensi_atas');
            $malam->tensi_bawah = $request->get('tensi_bawah');
            $malam->id_petugas = Auth::id();
            $malam->save();
        }

        Session::flash('message', 'Catatan tensi pasien berhasil disimpan');

        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('tensi::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('tensi::edit');
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
