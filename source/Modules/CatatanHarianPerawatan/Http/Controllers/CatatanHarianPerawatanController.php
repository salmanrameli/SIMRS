<?php

namespace Modules\CatatanHarianPerawatan\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\CatatanHarianPerawatan\Entities\CatatanHarianPerawatan;
use Modules\Pasien\Entities\Pasien;
use Modules\RawatInap\Entities\RawatInap;

class CatatanHarianPerawatanController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('checkRole:3')->except('showAllCatatanHarianDanPerawatan');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllCatatanHarianDanPerawatan($id)
    {
        $pasien = Pasien::where('id', $id)->first();

        $catatan = CatatanHarianPerawatan::where('id_pasien', $id)->orderBy('created_at', 'desc')->get();

        $tanggal_masuk = RawatInap::where('id_pasien', '=', $pasien->ktp)->value('tanggal_masuk');

        $diagnosa_awal = RawatInap::where('id_pasien', '=', $pasien->ktp)->value('diagnosa_awal');

        return view('catatanharianperawatan::index')
            ->with('pasien', $pasien)
            ->with('catatans', $catatan)
            ->with('tanggal_masuk', $tanggal_masuk)
            ->with('diagnosa_awal', $diagnosa_awal);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createNewCatatanHarianDanPerawatan($id)
    {
        $pasien = Pasien::findorFail($id);

        return view('catatanharianperawatan::create')->with('pasien', $pasien);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function storeCatatanHarianDanPerawatan(Request $request)
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

        Session::flash('message', 'Catatan harian dan perawatan berhasil disimpan');

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
    public function editCatatanHarianDanPerawatan($id, $catatan)
    {
        $catatan = CatatanHarianPerawatan::findorFail($catatan);

        $pasien = Pasien::findorFail($id);

        return view('catatanharianperawatan::edit')
            ->with('catatan', $catatan)
            ->with('pasien', $pasien);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateCatatanHarianDanPerawatan(Request $request, $id_pasien, $catatan)
    {
        $catatan = CatatanHarianPerawatan::findorFail($catatan);

        $this->validate($request, [
            'id_pasien' => 'required',
            'tanggal_keterangan' => 'required',
            'jam' => 'required|date_format:H:i',
            'asuhan_keperawatan_soap' => 'required',
            'id_petugas' => 'required'
        ]);

        $input = $request->all();

        $catatan->fill($input)->save();

        Session::flash('message', 'Catatan harian dan perawatan berhasil diubah');

        return redirect()->route('catatan_harian_perawatan.index', $id_pasien);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
