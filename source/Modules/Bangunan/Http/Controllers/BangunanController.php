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
use Modules\RawatInap\Entities\RawatInap;
use Modules\RawatInap\Entities\TanggalKeluarRawatInap;

class BangunanController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('checkRole:1');
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

        $kamar = collect(Kamar::select('id', 'nomor_lantai', 'nama_kamar', 'jumlah_maks_pasien')->get());

        $terisi_sekarang = DB::table('rawat_inap')
            ->select('nama_kamar', DB::raw('count(id_pasien) as pasien_inap'))
            ->whereNotIn('id_rm', TanggalKeluarRawatInap::select('id_rm')->get())
            ->groupBy('nama_kamar')
            ->get();

        return view('bangunan::index')
            ->with('pasiens', $pasien_ranap)
            ->with('terisis', $terisi_sekarang)
            ->with('lantais', $lantai)
            ->with('kamars', $kamar);
    }

    public function addNewLantai()
    {
        return view('bangunan::lantai.create');
    }

    public function saveNewLantai(Request $request)
    {
        $this->validate($request, [
            'nomor_lantai' => 'required'
        ]);

        $input = $request->all();

        Lantai::create($input);

        Session::flash('message', 'Lantai berhasil ditambahkan');

        return redirect()->route('bangunan.index');
    }

    public function editLantai($id)
    {
        $lantai = Lantai::findorFail($id);

        return view('bangunan::lantai.edit')->with('lantai', $lantai);
    }

    public function updateLantai(Request $request, $id)
    {
        $lantai = Lantai::findorFail($id);

        $this->validate($request, [
            'nomor_lantai' => 'required'
        ]);

        $input = $request->all();

        $lantai->fill($input)->save();

        Session::flash('message', 'Nomor lantai berhasil diubah');

        return redirect()->route('bangunan.index');
    }

    public function getAllKamar()
    {

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
            'jumlah_maks_pasien' => 'required'
        ]);

        $kamar = new Kamar();
        $kamar->nomor_lantai = $request->nomor_lantai;
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->jumlah_maks_pasien = $request->jumlah_maks_pasien;
        $kamar->save();

        Session::flash('message', 'Kamar Berhasil Disimpan');

        return redirect()->route('bangunan.index');
    }

    public function showDetailKamar($id)
    {
        $kamar = Kamar::findorFail($id);

        return view('bangunan::kamar.show')
            ->with('kamar', $kamar);
    }

    public function editKamar($id)
    {
        $kamar = Kamar::findorFail($id);

        return view('bangunan::kamar.edit')
            ->with('kamar', $kamar);
    }

    public function updateKamar(Request $request, $id)
    {
        $kamar = Kamar::findorFail($id);

        $this->validate($request, [
            'nama_kamar' => 'required',
            'jumlah_maks_pasien' => 'required'
        ]);

        $input = $request->all();

        $kamar->fill($input)->save();

        Session::flash('message', 'Detail kamar berhasil diubah');

        return redirect()->route('kamar.show', $id);
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
