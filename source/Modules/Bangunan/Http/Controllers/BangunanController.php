<?php

namespace Modules\Bangunan\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Bangunan\Entities\Kamar;
use Modules\Bangunan\Entities\Lantai;
use Modules\ModulSistem\Entities\ModulSistem;
use Modules\RawatInap\Entities\RawatInap;
use Modules\RawatInap\Entities\TanggalKeluarRawatInap;

class BangunanController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');

        $id_modul = ModulSistem::where('modul', '=', config('bangunan.name'))->value('id');

        $this->middleware('userCanAccess:'.$id_modul, ['only' => 'showAllLantai']);

        $this->middleware('userCanCreate:'.$id_modul, ['only' => ['saveNewLantai', 'saveKamar']]);

        $this->middleware('userCanUpdate:'.$id_modul, ['only' => ['updateLantai', 'updateKamar']]);

        $this->middleware('userCanDelete:'.$id_modul, ['only' => ['deleteKamar', 'deleteLantai']]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function showAllLantai()
    {
        $pasien_ranap = RawatInap::with('pasien')
            ->select('*')
            ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
            ->get();

        $lantai = Lantai::select('nomor_lantai', 'id')->orderBy('lantai.id', 'desc')->get();

        $kamar = collect(Kamar::select('id', 'nomor_lantai', 'nama_kamar', 'jumlah_maks_pasien', 'biaya_per_malam')->get());

        $terisi_sekarang = DB::table('rawat_inap')
            ->select('nama_kamar', DB::raw('count(id_pasien) as pasien_inap'))
            ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
            ->groupBy('nama_kamar')
            ->get();

        return view('bangunan::index')
            ->with('pasiens', $pasien_ranap)
            ->with('terisis', $terisi_sekarang)
            ->with('lantais', $lantai)
            ->with('kamars', $kamar)
            ->with('lantai_baru', $lantai->first());
    }

    public function addNewLantai()
    {
        return view('bangunan::lantai.create');
    }

    public function saveNewLantai(Request $request)
    {
        $this->validate($request, [
            'nomor_lantai' => 'required',
        ]);

        $lantai = new Lantai();
        $lantai->nomor_lantai = $request->get('nomor_lantai');
        $lantai->save();

        Session::flash('message', 'Lantai berhasil ditambahkan.');

        return redirect()->route('bangunan.index');
    }

    public function updateLantai(Request $request)
    {
        $this->validate($request, [
            'nomor_lantai' => 'required'
        ]);

        $lantai = Lantai::findorFail($request->get('id_lantai'));
        $lantai->nomor_lantai = $request->get('nomor_lantai');
        $lantai->save();

        Session::flash('message', 'Nomor lantai berhasil diubah.');

        return redirect()->route('bangunan.index');
    }

    public function addNewKamar()
    {
        $lantai = Lantai::pluck('nomor_lantai');

        return view('bangunan::kamar.create')->with('lantais', $lantai);
    }

    public function saveKamar(Request $request)
    {
        $this->validate($request, [
            'nomor_lantai' => 'required',
            'nama_kamar' => 'required',
            'jumlah_maks_pasien' => 'required',
            'biaya_per_malam' => 'required'
        ]);

        $kamar = new Kamar();
        $kamar->nomor_lantai = $request->get('nomor_lantai');
        $kamar->nama_kamar = $request->get('nama_kamar');
        $kamar->jumlah_maks_pasien = $request->get('jumlah_maks_pasien');
        $kamar->biaya_per_malam = $request->get('biaya_per_malam');
        $kamar->save();

        Session::flash('message', 'Kamar berhasil disimpan.');

        return redirect()->route('bangunan.index');
    }

    public function updateKamar(Request $request)
    {
        $this->validate($request, [
            'id_kamar' => 'required',
            'nama_kamar' => 'required',
            'jumlah_maks_pasien' => 'required',
            'biaya_per_malam' => 'required'
        ]);

        $kamar = Kamar::findorFail($request->get('id_kamar'));
        $kamar->nama_kamar = $request->get('nama_kamar');
        $kamar->jumlah_maks_pasien = $request->get('jumlah_maks_pasien');
        $kamar->biaya_per_malam = $request->get('biaya_per_malam');
        $kamar->save();

        Session::flash('message', 'Rincian kamar berhasil diubah.');

        return redirect()->route('bangunan.index');
    }

    public function deleteKamar($id)
    {
        $ranap = RawatInap::where('nama_kamar', '=', Kamar::where('id', '=', $id)->value('nama_kamar'))->exists();
        $belum_keluar = RawatInap::whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())->exists();

        if($ranap && $belum_keluar)
        {
            Session::flash('warning', 'Ruangan tidak dapat dihapus karena masih ada pasien yang menempati ruang yang bersangkutan');

            return redirect()->back();
        }

        $kamar = Kamar::findorFail($id);
        $kamar->delete();

        Session::flash('message', 'Ruangan berhasil dihapus');

        return redirect()->route('bangunan.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function deleteLantai($id)
    {
        $kamar = Kamar::where('nomor_lantai', '=', $id)->exists();

        if($kamar)
        {
            Session::flash('warning', 'Lantai tidak bisa dihapus karena masih ada kamar yang bergantung pada lantai yang bersangkutan');

            return redirect()->back();
        }

        $lantai = Lantai::findorFail($id);

        $lantai->delete();

        Session::flash('message', 'Lantai berhasil dihapus');

        return redirect()->route('bangunan.index');
    }
}
