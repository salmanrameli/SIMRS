<?php

namespace Modules\KonsumsiObat\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\KonsumsiObat\Entities\HariPerawatan;

class HariPerawatanController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('konsumsiobat::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('konsumsiobat::create');
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

        Session::flash('message', 'Rincian hari perawatan berhasil disimpan.');

        return redirect()->route('konsumsi_obat.index', $request->get('id_ranap'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('konsumsiobat::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('konsumsiobat::edit');
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
