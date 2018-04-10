<?php

namespace Modules\RawatInap\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Pasien\Entities\Pasien;
use Modules\RawatInap\Entities\CatatanHarianPerawatan;
use Modules\RawatInap\Entities\RawatInap;

class CatatanHarianPerawatanController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id)
    {
        $pasien = Pasien::where('id', $id)->first();

        $catatan = CatatanHarianPerawatan::where('id_pasien', $id)->get();

        $tanggal_masuk = RawatInap::where('id_pasien', '=', $pasien->ktp)->whereNull('tanggal_keluar')->value('tanggal_masuk');

        return view('rawatinap::catatan_harian_perawatan.index')
            ->with('pasien', $pasien)
            ->with('catatans', $catatan)
            ->with('tanggal_masuk', $tanggal_masuk);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id)
    {
        $pasien = Pasien::findorFail($id);

        return view('rawatinap::catatan_harian_perawatan.create')->with('pasien', $pasien);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_pasien' => 'required',
            'tanggal_keterangan' => 'required',
            'jam' => 'required|date_format:H:i',
            'asuhan_keperawatan_soap' => 'required',
            'id_petugas' => 'required'
        ]);

        $input = $request->all();

        CatatanHarianPerawatan::create($input);

        Session::flash('message', 'Catatan Harian dan Perawatan berhasil disimpan');

        return redirect()->route('catatan_harian_perawatan.index', $request->id_pasien);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('rawatinap::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('rawatinap::edit');
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
