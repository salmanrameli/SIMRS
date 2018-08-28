<?php

namespace Modules\CatatanHarianPerawatan\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\CatatanHarianPerawatan\Entities\CatatanHarianPerawatan;
use Modules\CatatanHarianPerawatan\Entities\RevisiCatatanHarianPerawatan;
use Modules\RawatInap\Entities\RawatInap;

class CatatanHarianPerawatanController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('checkRole:3')->except('showAllCatatanHarianDanPerawatan');

        $this->middleware('checkIfAuthorized');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllCatatanHarianDanPerawatan($id_ranap)
    {
        $catatan = CatatanHarianPerawatan::where('id_ranap', '=', $id_ranap)->orderBy('created_at', 'desc')->get();

        if(!$catatan)
        {
            $catatan = null;
        }

        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        return view('catatanharianperawatan::index')
            ->with('ranap', $ranap)
            ->with('catatans', $catatan);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createNewCatatanHarianDanPerawatan($id_ranap)
    {
        $ranap = RawatInap::findorFail($id_ranap);

        return view('catatanharianperawatan::create')->with('ranap', $ranap);
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function storeCatatanHarianDanPerawatan(Request $request)
    {
        $this->validate($request, [
            'id_ranap' => 'required',
            'tanggal_keterangan' => 'required',
            'jam' => 'required',
            'asuhan_keperawatan_soap' => 'required',
        ]);

        $catatan = new CatatanHarianPerawatan();
        $catatan->id_ranap = $request->get('id_ranap');
        $catatan->tanggal_keterangan = $request->get('tanggal_keterangan');
        $catatan->jam = $request->get('jam');
        $catatan->asuhan_keperawatan_soap = $request->get('asuhan_keperawatan_soap');
        $catatan->id_petugas = Auth::id();
        $catatan->save();

        Session::flash('message', 'Catatan harian dan perawatan berhasil disimpan.');

        return redirect()->route('catatan_harian_perawatan.index', $request->get('id_ranap'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateCatatanHarianDanPerawatan(Request $request)
    {
        $this->validate($request, [
            'asuhan_keperawatan_soap' => 'required',
        ]);

        $catatan = CatatanHarianPerawatan::findorFail($request->get('id_catatan_harian'));

        $revisi_catatan = new RevisiCatatanHarianPerawatan();
        $revisi_catatan->id_catatan_harian_perawatan = $catatan->id;
        $revisi_catatan->asuhan_keperawatan_soap = $catatan->asuhan_keperawatan_soap;
        $revisi_catatan->save();

        $catatan->asuhan_keperawatan_soap = $request->get('asuhan_keperawatan_soap');
        $catatan->save();

        Session::flash('message', 'Perubahan berhasil disimpan.');

        return redirect()->route('catatan_harian_perawatan.index', $request->get('id_ranap'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function lihatRevisiCatatanHarianDanPerawatan($id_ranap, $id_catatan_harian)
    {
        $ranap = RawatInap::with('pasien')->where('id', '=', $id_ranap)->first();

        $revisi = RevisiCatatanHarianPerawatan::where('id_catatan_harian_perawatan', '=', $id_catatan_harian)->orderBy('created_at', 'desc')->get();

        return view('catatanharianperawatan::revisi')
            ->with('ranap', $ranap)
            ->with('revisis', $revisi);
    }
}
